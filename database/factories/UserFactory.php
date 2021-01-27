<?php

namespace Database\Factories;

use App\Models\Certificate;
use App\Models\Children;
use App\Models\EmployeeDegree;
use App\Models\Position;
use App\Models\SocialStatus;
use App\Models\Title;
use App\Models\Transportation;
use App\Models\UniversityService;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fakerAr = \Faker\Factory::create('ar_JO');
        return [
            'name' => $fakerAr->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'employee_no' => $this->faker->numberBetween(111111,99999999),
            'employer' => $this->faker->randomElement(['جامعة بغداد','جامعة الموصل','جامعة البصرة','جامعة الشمال','جامعة الجنوب']),
            'address' => $fakerAr->address,
            'hiring_date' => $this->faker->dateTimeBetween('-3 years','-1 year'),
            'card_id' => $this->faker->creditCardNumber,
            'notes' => $fakerAr->paragraph,
            'employee_degree_id' => EmployeeDegree::all()->random(),
            'social_status_id' => SocialStatus::all()->random(),
            'title_id' => Title::all()->random(),
            'certificate_id' => Certificate::all()->random(),
            'transportation_id' => Transportation::all()->random(),
            'university_service_id' => UniversityService::all()->random(),
            'children_id' => Children::all()->random(),
            'position_id' => Position::all()->random(),
        ];
    }
}
