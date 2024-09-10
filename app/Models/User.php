<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Support\Facades\URL;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail($this->verificationUrl()));
    }

    protected function verificationUrl()
    {
        return URL::temporarySignedRoute('verification.verify', now()->addMinutes(config('auth.verification.expire', 60)), ['id' => $this->getKey(), 'hash' => sha1($this->getEmailForVerification())]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['lname', 'email', 'fname', 'number', 'where', 'password', 'last_login_at', 'dob', 'country', 'bypass'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function stationUser()
    {
        return $this->hasMany(StationUser::class);
    }
}
