<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Countries;
use Carbon\Carbon;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View as BladeView;

use App\Services\BrevoMailer;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): BladeView
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'where' => ['required', 'string', 'max:255'],
        ]);

        $marketing = $request->has('marketing');

        // Extract the phone prefix
        $phoneNumber = $request->input('country');
        $phonePrefix = '+' . substr($phoneNumber, 1, 2); // Assumes prefix is 2 digits
        $country = Countries::where('phone_code', $phonePrefix)->first();

        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'dob' => $request->dob,
            'number' => $phoneNumber,
            'email' => $request->email,
            'where' => $request->where,
            'country' => $country->name ?? null,
            'marketing' => $marketing,
            'last_login_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('client');

        // ✅ Generate email verification link
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(Config::get('auth.verification.expire', 60)),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        // ✅ Render email content from Blade
        $html = View::make('vendor.notifications.email', [
            'actionUrl' => $verificationUrl,
        ])->render();

        BrevoMailer::sendVerification($user->email, $user->fname, 'Verify Your Email', $html);


        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
