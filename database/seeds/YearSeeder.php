<?php

use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('years')->insert([
            'year' => '2017/2018',
        ]);
        DB::table('years')->insert([
            'year' => '2018/2019',
        ]);
    }
}
