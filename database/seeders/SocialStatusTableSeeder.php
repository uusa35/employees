<?php

namespace Database\Seeders;

use App\Models\SocialStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialStatusTableSeeder extends Seeder
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
                'title' => 'متزوج',
                'value' => 50000,

            ],
            [
                'title' => 'غير متزوج',
                'value' => 0
            ],
            [
                'title' => 'اعزب',
                'value' => 0
            ],
            [
                'title' => 'مطلق',
                'value' => 0
            ],
            [
                'title' => 'ارمل',
                'value' => 0
            ],
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('social_status')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach ($array as $k => $a) {
            DB::table('social_status')->insert([
                'title' => $a['title'],
                'value' => $a['value']
            ]);
        }
    }
}
