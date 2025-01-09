<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hobi;

class HobiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hobi::create(['hobby' => 'Membaca']);
        Hobi::create(['hobby' => 'Olahraga']);
        Hobi::create(['hobby' => 'Menggambar']);
        Hobi::create(['hobby' => 'Menulis']);
    }
}
