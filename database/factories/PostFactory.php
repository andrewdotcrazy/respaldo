<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Post;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Post::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->name();
        return [
            'title' => $name,
            'slug' => $this->faker->unique()->slug(),
            'content' => $this->faker->paragraph(1),
            'description' => $this->faker->paragraph(4),
            'category_id' => $this->faker->randomElement([1,2,3]),
            'user_id' => 1,
            'posted' => $this->faker->randomElement([1,2,3]),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
