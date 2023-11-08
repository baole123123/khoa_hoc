<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ChapterSeeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\LessonSeeder;
use Database\Seeders\LevelSeeder;
use Database\Seeders\MemberSeeder;
use Database\Seeders\Course_MemberSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $this->call(ChapterSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(LessonSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(Course_MemberSeeder::class);
    }
}
