<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'nama'    => 'CHELSEA 3RD 2018-2019',
                'liga_id' => 2,
                'gambar'  => 'uploads/products/chelsea.png',
            ],
            [
                'nama'    => 'LEICESTER CITY HOME 2018-2019',
                'liga_id' => 2,
                'gambar'  => 'uploads/products/leicester.png',
            ],
            [
                'nama'    => 'MAN. UNITED AWAY 2018-2019',
                'liga_id' => 2,
                'gambar'  => 'uploads/products/mu.png',
            ],
            [
                'nama'    => 'LIVERPOOL AWAY 2018-2019',
                'liga_id' => 2,
                'gambar'  => 'uploads/products/liverpool.png',
            ],
            [
                'nama'    => 'TOTTENHAM 3RD 2018-2019',
                'liga_id' => 2,
                'gambar'  => 'uploads/products/tottenham.png',
            ],
            [
                'nama'    => 'DORTMUND AWAY 2018-2019',
                'liga_id' => 1,
                'gambar'  => 'uploads/products/dortmund.png',
            ],
            [
                'nama'    => 'BAYERN MUNCHEN 3RD 2018 2019',
                'liga_id' => 1,
                'gambar'  => 'uploads/products/munchen.png',
            ],
            [
                'nama'    => 'JUVENTUS AWAY 2018-2019',
                'liga_id' => 4,
                'gambar'  => 'uploads/products/juve.png',
            ],
            [
                'nama'    => 'AS ROMA HOME 2018-2019',
                'liga_id' => 4,
                'gambar'  => 'uploads/products/asroma.png',
            ],
            [
                'nama'    => 'AC MILAN HOME 2018 2019',
                'liga_id' => 4,
                'gambar'  => 'uploads/products/acmilan.png',
            ],
            [
                'nama'    => 'LAZIO HOME 2018-2019',
                'liga_id' => 4,
                'gambar'  => 'uploads/products/lazio.png',
            ],
            [
                'nama'    => 'REAL MADRID 3RD 2018-2019',
                'liga_id' => 3,
                'gambar'  => 'uploads/products/madrid.png',
            ],
        ];

        Product::insert($products);
    }
}
