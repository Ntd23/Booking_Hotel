<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms= [
          'name'=> 'Phòng bình dân',
          'price'=> '400,000',
          'quantity'=> '2',
          'quantity_adult'=> '2',
          'quantity_child'=> '2',
          'image'=> '',
          'status'=> 'available'
        ];
        Room::insert($rooms);
    }
}
