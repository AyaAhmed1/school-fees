<?php

use Illuminate\Database\Seeder;
use App\School;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            'type' => 'American',
        ]);

        DB::table('schools')->insert([
            'type' => 'British',
        ]);
    }
}
