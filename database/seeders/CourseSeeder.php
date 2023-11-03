<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'name' => 'Admin' ,
                'description' => 'adidaphat',
                'image' => '',
                'status' => 2 ,
                'category_id' => 1 ,
                'level_id' => 1

            ],
        ]);
    }
}
