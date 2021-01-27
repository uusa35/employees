<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionTableSeeder extends Seeder
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
                'title' => 'رئيس الجامعة',
                'percentage' => 100,

            ],
            [
                'title' => 'مساعد رئيس الجامعة',
                'percentage' => 75
            ],
            [
                'title' => 'العميد',
                'percentage' => 55
            ],
            [
                'title' => 'معاون العميد',
                'percentage' => 45
            ],
            [
                'title' => 'رئيس القسم',
                'percentage' => 35
            ],
            [
                'title' => 'مقرر القسم',
                'percentage' => 25
            ],
            [
                'title' => 'مدير القسم',
                'percentage' => 15
            ],
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('positions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($array as $k => $a) {
            DB::table('positions')->insert([
                'title' => $a['title'],
                'percentage' => $a['percentage']
            ]);
        }
    }
}
