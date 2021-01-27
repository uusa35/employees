<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversityServiceTableSeeder extends Seeder
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
                'title' => 'تدريسي',
                'percentage' => 100,

            ],
            [
                'title' => 'إداري',
                'percentage' => 75
            ],
            [
                'title' => 'فني',
                'percentage' => 100
            ],
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('university_services')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach ($array as $k => $a) {
            DB::table('university_services')->insert([
                'title' => $a['title'],
                'percentage' => $a['percentage']
            ]);
        }
    }
}
