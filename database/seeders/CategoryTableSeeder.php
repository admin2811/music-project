<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;
use Illuminate\Support\Testing\Fakes\Fake;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $faker = Faker::create();
      for($i = 0; $i<50;$i++){
        Category::create([
            'ma_tloai'=>$i+1,
            'ten_tloai' => $faker->sentence(1)
        ]);
      }
        
    }
}
