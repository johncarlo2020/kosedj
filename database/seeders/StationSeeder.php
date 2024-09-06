<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Station;
use App\Models\Regime;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Survey;
use App\Models\Brand;
use App\Models\Question;

use Illuminate\Support\Facades\Hash;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Station::create([
            'name' => 'Photo Op',
        ]);

        Station::create([
            'name' => 'Sampling & Sales Zone',
        ]);

        Station::create([
            'name' => 'Redemption',
        ]);

        Station::create([
            'name' => 'Gift with Purchase',
        ]);

        Survey::insert([['name' => 'Blood Deficient'], ['name' => 'Blood Stagnant'], ['name' => 'Qi Deficient'], ['name' => 'Qi Stagnant'], ['name' => 'Water Stagnant']]);

        Question::insert([
            [
                'name' => 'Pale complexion and skin lack luster',
                'survey_id' => 1,
            ],
            [
                'name' => 'Dry lips and skin',
                'survey_id' => 1,
            ],
            [
                'name' => 'Dry hair and skin',
                'survey_id' => 1,
            ],
            [
                'name' => 'Concerned about gray hair and hair loss',
                'survey_id' => 1,
            ],
            [
                'name' => 'Fragile nails, nails turning white, prominent lines on nails',
                'survey_id' => 1,
            ],
            [
                'name' => 'Severe coldness in fingers and toes',
                'survey_id' => 1,
            ],
            [
                'name' => 'Frequent dizziness',
                'survey_id' => 1,
            ],
            [
                'name' => 'Unable to fall sleep or often dreaming and unable to sleep deeply',
                'survey_id' => 1,
            ],
            [
                'name' => 'Prone to reddish black acne & pimples',
                'survey_id' => 2,
            ],
            [
                'name' => 'Concerned about dark spots on the face and limbs',
                'survey_id' => 2,
            ],
            [
                'name' => 'Rough & chapped heels all year round',
                'survey_id' => 2,
            ],
            [
                'name' => 'Eye bags often appear under the eyes',
                'survey_id' => 2,
            ],
            [
                'name' => 'Dull skin complexion or and lip color tone',
                'survey_id' => 2,
            ],
            [
                'name' => 'My fingers and toes are cold, but my head feels hot.',
                'survey_id' => 2,
            ],
            [
                'name' => 'Have symptoms of chronic headaches and stiff shoulders',
                'survey_id' => 2,
            ],
            [
                'name' => 'Pale complexion and skin lack luster',
                'survey_id' => 2,
            ],
            [
                'name' => 'Severe menstrual pain',
                'survey_id' => 2,
            ],
            [
                'name' => 'Feeling tired & sleepy immediately after meals',
                'survey_id' => 3,
            ],
            [
                'name' => 'Easily fatigue',
                'survey_id' => 3,
            ],
            [
                'name' => 'Low metabolism',
                'survey_id' => 3,
            ],
            [
                'name' => 'Easy to catch a cold',
                'survey_id' => 3,
            ],
            [
                'name' => 'Sweat easily, and sweat profusely even after moving a little',
                'survey_id' => 3,
            ],
            [
                'name' => 'Difficulty getting up in the morning',
                'survey_id' => 3,
            ],
            [
                'name' => 'Prone to feeling cold than others',
                'survey_id' => 3,
            ],
            [
                'name' => 'Breast swelling and tender before menstruation',
                'survey_id' => 4,
            ],
            [
                'name' => 'Severe PMS (mood swings, breast swelling, etc.)',
                'survey_id' => 4,
            ],
            [
                'name' => 'Feel uncomfortable when nervous or angry',
                'survey_id' => 4,
            ],
            [
                'name' => 'Prone to fatigue',
                'survey_id' => 4,
            ],
            [
                'name' => 'Easily bloated and prone to burping',
                'survey_id' => 4,
            ],
            [
                'name' => 'Trouble sleeping',
                'survey_id' => 4,
            ],
            [
                'name' => 'Often & Easily irritable',
                'survey_id' => 4,
            ],
            [
                'name' => 'The body is easily swell / water retention in the body',
                'survey_id' => 5,
            ],
            [
                'name' => 'Heavy and weak body',
                'survey_id' => 5,
            ],
            [
                'name' => 'Feel unwell when the weather is going to rain or the air pressure is low.',
                'survey_id' => 5,
            ],
            [
                'name' => 'Prone to motion sickness',
                'survey_id' => 5,
            ],
            [
                'name' => 'Frequency or infrequent urination',
                'survey_id' => 5,
            ],
            [
                'name' => 'Mouth becomes dry when talking, leads to frequent drinking.',
                'survey_id' => 5,
            ],
        ]);

        $role = Role::create(['name' => 'client']);

        $role = Role::create(['name' => 'admin']);

        $user = User::create([
            'fname' => 'admin',
            'lname' => 'admin',
            'where' => 'admin',
            'dob' => 'admin',
            'number' => '0123456789',
            'email' => 'admin@gmail.com',
            'country' => 'Malaysia',
            'password' => Hash::make('WowsomeRohto'),
        ]);

        $user->assignRole('admin');
    }
}
