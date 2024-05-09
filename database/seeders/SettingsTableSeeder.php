<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('settings')->delete();

        $data=[
            ['key'=>'current_session', 'value'=> '2022-2023'],
            ['key'=>'school_title', 'value'=> 'Farrag'],
            ['key'=>'school_name', 'value'=> 'Farrag International School'],
            ['key'=>'end_first_term', 'value'=> '01-12-2022'],
            ['key'=>'end_second_term', 'value'=> '01-03-2023'],
            ['key'=>'phone', 'value'=> '0123456789'],
            ['key'=>'address', 'value'=> 'القاهرة'],
            ['key'=>'school_email', 'value'=> 'farraghere@school.com'],
            ['key'=>'logo', 'value'=> '1.jpg'],
        ];
        DB::table('settings')->insert($data);
    }
}
