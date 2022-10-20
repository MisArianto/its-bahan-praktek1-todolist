<?php

namespace Database\Seeders;

use App\Models\Hari;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HariTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hari::create(['nama' => 'Senin']);
        Hari::create(['nama' => 'Selasa']);
        Hari::create(['nama' => 'Rabu']);
        Hari::create(['nama' => 'Kamis']);
        Hari::create(['nama' => 'Jumat']);
        Hari::create(['nama' => 'Sabtu']);
    }
}
