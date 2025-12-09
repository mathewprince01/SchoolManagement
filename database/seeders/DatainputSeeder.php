<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatainputSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('scl_classes')->insert(['name' => '1']);
        DB::table('scl_classes')->insert(['name' => '2']);
        DB::table('scl_classes')->insert(['name' => '3']);
        DB::table('scl_classes')->insert(['name' => '4']);
        DB::table('scl_classes')->insert(['name' => '5']);
        DB::table('scl_classes')->insert(['name' => '6']);
        DB::table('scl_classes')->insert(['name' => '7']);
        DB::table('scl_classes')->insert(['name' => '8']);
        DB::table('scl_classes')->insert(['name' => '9']);
        DB::table('scl_classes')->insert(['name' => '10']);
        DB::table('scl_classes')->insert(['name' => '11']);
        DB::table('scl_classes')->insert(['name' => '12']);


        DB::table('sections')->insert(['name' => 'A']);
        DB::table('sections')->insert(['name' => 'B']);
        DB::table('sections')->insert(['name' => 'C']);
        DB::table('sections')->insert(['name' => 'D']);


        DB::table('genders')->insert(['name' => 'Male']);
        DB::table('genders')->insert(['name' => 'Female']);
        DB::table('genders')->insert(['name' => 'Other']);


        DB::table('subjects')->insert(['name' => 'Maths']);
        DB::table('subjects')->insert(['name' => 'Science']);
        DB::table('subjects')->insert(['name' => 'English']);
        DB::table('subjects')->insert(['name' => 'History']);


        DB::table('exams')->insert(['exam_name' => 'Mid-term', 'exam_date' => '2025-11-15']);
        DB::table('exams')->insert(['exam_name' => 'Mid-term','exam_date' => '2025-11-17']);
        DB::table('exams')->insert(['exam_name' => 'Mid-term ','exam_date' => '2025-11-19']);
        DB::table('exams')->insert(['exam_name' => 'Mid-term ','exam_date' => '2025-11-20']);


    }
}
