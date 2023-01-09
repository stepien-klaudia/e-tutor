<?php

namespace Database\Seeders;

use App\Models\AnnouncementLevel;
use Illuminate\Database\Seeder;

class AnnouncementLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Nauczanie wczesnoszkolne'],
            ['name' => 'Szkoła podstawowa'],
            ['name'=>'Szkoła średnia'],
            ['name' => 'Szkoła wyższa'],
        ];
        AnnouncementLevel::insert($data);
    }
}
