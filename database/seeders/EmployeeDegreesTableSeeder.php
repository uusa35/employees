<?php

namespace Database\Seeders;

use App\Models\EmployeeDegree;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeDegreesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'basic_salary' => 910000,
                'years_of_service' => 0,
                'increment' => 20000
            ],
            [
                'basic_salary' => 723000,
                'years_of_service' => 5,
                'increment' => 17000
            ],
            [
                'basic_salary' => 600000,
                'years_of_service' => 5,
                'increment' => 10000
            ],
            [
                'basic_salary' => 509000,
                'years_of_service' => 5,
                'increment' => 8000
            ],
            [
                'basic_salary' => 429000,
                'years_of_service' => 5,
                'increment' => 6000
            ],
            [
                'basic_salary' => 362000,
                'years_of_service' => 5,
                'increment' => 6000
            ],
            [
                'basic_salary' => 269000,
                'years_of_service' => 5,
                'increment' => 6000
            ]
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('employee_degrees')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach ($array as $k => $a) {
            DB::table('employee_degrees')->insert([
                [
                    'basic_salary' => $a['basic_salary'],
                    'years_of_service' => $a['years_of_service'],
                    'increment' => $a['increment'],
                ]
            ]);
        }
    }
}
