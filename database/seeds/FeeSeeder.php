<?php

use Illuminate\Database\Seeder;

class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fees')->insert([
            'type' => 'Admission Fees',
        ]);
        DB::table('fees')->insert([
            'type' => 'First Installment',
        ]);
        DB::table('fees')->insert([
            'type' => 'Second Installment',
        ]);
    }
}
