<?php

namespace Database\Seeders;

use App\Models\Title;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitleTableSeeder extends Seeder
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
                'title' => 'استاذ',
                'percentage' => 50,

            ],
            [
                'title' => 'استاذ مساعد',
                'percentage' => 35
            ],
            [
                'title' => 'مدرس',
                'percentage' => 25
            ],
            [
                'title' => 'مدرس مساعد',
                'percentage' => 15
            ],
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('titles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach ($array as $k => $a) {
            DB::table('titles')->insert([
                'title' => $a['title'],
                'percentage' => $a['percentage']
            ]);
        }
    }
}
