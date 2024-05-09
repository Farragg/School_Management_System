<?php

namespace Database\Seeders;
use App\Models\Specialization;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Database\Seeders\ClassroomTableSeeder;
use Database\Seeders\GradeSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\ParentsTableSeeder;
use Database\Seeders\SectionsTableSeeder;
use Database\Seeders\StudentsTableSeeder;
use Database\Seeders\SettingsTableSeeder;
use Database\Seeders\BloodTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(ClassroomTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(BloodTableSeeder::class);
        $this->call(NationalitiesTableSeeder::class);
        $this->call(ReligionTableSeeder::class);
        $this->call(SpecializationsTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(ParentsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
