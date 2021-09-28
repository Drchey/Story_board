<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(5,7));
        $dateTime =$this->faker->dateTimeBetween('-1 month', 'now');
        $content = '';
        for($i=0;$i<5;$i++){
            $content .= '<p class="mb-4">'.$this->faker->sentence(rand(5,7), true).'</p>';
        }
        return [

            'title' => $title,
            'slug' => Str::slug($title).'-'.rand(1111,9999),
            'img' => $this->faker->image(storage_path('app/public')),
            'is_active' => true,
            'content' => $content,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ];
    }
}
