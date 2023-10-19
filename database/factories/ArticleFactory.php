<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        
        return [
            'tieude' => $this->faker->sentence,
            'ten_bhat' => $this->faker->word,
            'ma_tloai' => null,
            'tomtat' => $this->faker->paragraph,
            'noidung' => $this->faker->text,
            'ma_tgia' =>null,
            'ngayviet' => $this->faker->dateTimeThisDecade,
            'hinh' => $this->faker->imageUrl(200, 200),
        ];
    }
}
