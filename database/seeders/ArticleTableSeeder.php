<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            Article::create([
                'ma_bviet' => $i + 1,
                'tieude' => $faker->sentence(10),
                'ten_bhat' => $faker->sentence(5),
                'ma_tloai' => $faker->numberBetween(1, 50),
                'tomtat' => $faker->sentence(20),
                'noidung' => $faker->sentence(100),
                'ma_tgia' => $faker->numberBetween(1, 50),
                'ngayviet' => $faker->dateTime(),
                'hinh' => $faker->imageUrl(200, 200, 'music', true),
            ]);
        }
    //     Article::factory()
    //     ->count(10)
    //     ->has(
    //         Category::factory()->state(function($category){
    //             return ['ma_tloai'=>Category::factory()->create()->ma_tloai];
    //         })
    //     )
    //     ->create();
    // }
    }
}
