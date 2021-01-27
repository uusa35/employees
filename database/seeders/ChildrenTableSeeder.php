<?php

namespace Database\Seeders;

use App\Models\UniversityService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildrenTableSeeder extends Seeder
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
                'title' => 'تصنيف أول (١-٤)',
                'value' => 10000,

            ],
            [
                'title' => 'تصنيف أول (٤-٥)',
                'value' => 15000,

            ],
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('children')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach ($array as $k => $a) {
            DB::table('children')->insert([
                'title' => $a['title'],
                'value' => $a['value']
            ]);
        }
    }
}
