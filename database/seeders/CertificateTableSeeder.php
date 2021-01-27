<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateTableSeeder extends Seeder
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
                'title' => 'الدكتوراه',
                'percentage' => 100,

            ],
            [
                'title' => 'الماجستير',
                'percentage' => 75
            ],
            [
                'title' => 'الدبلوم العالي',
                'percentage' => 55
            ],
            [
                'title' => 'البكالريوس',
                'percentage' => 45
            ],
            [
                'title' => 'الدبلوم',
                'percentage' => 35
            ],
            [
                'title' => 'إعدادية',
                'percentage' => 25
            ],
            [
                'title' => 'متوسط وما دون',
                'percentage' => 15
            ],
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('certificates')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach ($array as $k => $a) {
            DB::table('certificates')->insert([
                'title' => $a['title'],
                'percentage' => $a['percentage']
            ]);
        }
    }
}
