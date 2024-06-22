<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromotionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $promotions= [
          ['name'=> 'Flash Sale', 'title'=> 'Mã giảm 50%', 'code'=>'KM01','description'=>'Giảm tối đa 50% khi đặt phòng từ 2 đêm','discount'=>50]
        ];
        Promotion::insert($promotions);
    }
}
