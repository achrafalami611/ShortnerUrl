<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('shortnerurls')->insert([
            [
                'original_url' => 'https://laravel.com/docs/10.x/releases',
                'short_url' => 'alu9RE57',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'original_url' => 'https://vuejs.org/',
                'short_url' => '767yyhsjs5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
