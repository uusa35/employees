<?php

namespace Database\Seeders;

use App\Models\Transportation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportationTableSeeder extends Seeder
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
                'title' => 'محافظات',
                'value' => 60000,

            ],
            [
                'title' => 'نواحي',
                'value' => 40000
            ],
            [
                'title' => 'داخل المدن',
                'value' => 20000
            ],
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('transportations')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach ($array as $k => $a) {
            DB::table('transportations')->insert([
                'title' => $a['title'],
                'value' => $a['value']
            ]);
        }
    }
}
