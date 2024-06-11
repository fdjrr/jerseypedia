<?php

namespace Database\Seeders;

use App\Models\Liga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LigaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ligas = [
            [
                'nama'   => 'Bundes Liga',
                'negara' => 'Jerman',
                'gambar' => 'uploads/ligas/bundesliga.png',
            ],
            [
                'nama'   => 'Premier League',
                'negara' => 'Inggris',
                'gambar' => 'uploads/ligas/premierleague.png',
            ],
            [
                'nama'   => 'La Liga',
                'negara' => 'Spanyol',
                'gambar' => 'uploads/ligas/laliga.png',
            ],
            [
                'nama'   => 'Serie A',
                'negara' => 'Itali',
                'gambar' => 'uploads/ligas/seriea.png',
            ],
        ];

        Liga::insert($ligas);
    }
}
