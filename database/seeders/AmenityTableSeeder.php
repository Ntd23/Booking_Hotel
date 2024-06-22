<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmenityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amenities= [
          ['icon'=> '','name'=> 'Wifi', 'price'=> 120, 'description'=> ''],
          ['icon'=> '','name'=> 'TiVi', 'price'=> 80, 'description'=> '' ],
          ['icon'=> '','name'=> 'Phòng họp', 'price'=> 150, 'description'=> '']
        ];
        Amenity::insert($amenities);
    }
}
