<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specializations')->delete();
        $specialzations=[
            ['en'=>'Arabic', 'ar'=> 'عربي'],
            ['en'=>'English', 'ar'=> 'انجليزي'],
            ['en'=>'Computer', 'ar'=> 'حاسب الي'],
            ['en'=>'Science', 'ar'=> 'علوم']
        ];

        foreach ($specialzations as $specialzation){
            Specialization::create(['Name'=> $specialzation]);
        }
    }
}
