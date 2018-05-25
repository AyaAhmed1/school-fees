<?php

use Illuminate\Database\Seeder;
use App\Grade;
class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('grades')->insert([
            'grade' => 'Grade 1',
        ]);
        DB::table('grades')->insert([
            'grade' => 'Grade 2',
        ]);
        DB::table('grades')->insert([
            'grade' => 'Grade 3',
        ]);
    }
}
