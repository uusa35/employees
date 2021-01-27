<?php

namespace Database\Seeders;

use App\Models\EmployeeIntervention;
use App\Models\Salary;
use App\Models\User;
use Carbon\Carbon;
use CountriesTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmployeeDegreesTableSeeder::class);
        $this->call(PositionTableSeeder::class);
        $this->call(SocialStatusTableSeeder::class);
        $this->call(TitleTableSeeder::class);
        $this->call(UniversityServiceTableSeeder::class);
        $this->call(TransportationTableSeeder::class);
        $this->call(ChildrenTableSeeder::class);
        $this->call(CertificateTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('salaries')->truncate();
        DB::table('employee_interventions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        User::factory(10)->create()->each(function ($u) {
            if ($u->id === 1) {
                $u->update(['email' => 'admin@admin.com', 'is_admin' => true]);
            }
            $s = DB::table('salaries')->insert([
                'basic_salary' => $u->employee_degree->basic_salary,
                'certificate_allowance' => ($u->certificate->percentage / 100) * $u->employee_degree->basic_salary,
                'transportation_allowance' => $u->transportation->value,
                'social_status_allowance' => $u->social_status->value,
                'children_allowance' => $u->children->value,
                'title_allowance' => ($u->title->percentage / 100) * $u->employee_degree->basic_salary,
                'position_allowance' => ($u->position->percentage / 100) * $u->employee_degree->basic_salary,
                'other_allowance' => ($u->title->percentage / 100) * ($u->employee_degree->basic_salary / 2),
                'salary_date' => Carbon::now()->subMonth(1),
                'user_id' => $u->id
            ]);
            DB::table('employee_interventions')->insert([
                'taxes' => $u->employee_degree->basic_salary * 0.10,
                'retirement' => $u->employee_degree->basic_salary * 0.3,
                'loan' => $u->employee_degree->basic_salary * 0.5,
                'others' => $u->employee_degree->basic_salary * 0.1,
                'salary_id' => $u->id
            ]);
        });

    }
}
