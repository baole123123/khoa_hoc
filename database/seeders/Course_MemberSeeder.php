<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Course_MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Course_Member')->insert([
            [
                'member_id' => 1 ,
                'courses_id' => 2 ,
                'date' => '2023-12-01',
                'amount' => '1000'
            ],
        ]);
    }
}
