<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cat_name = $this->faker->randomElement([
            'Fashion & Accessories', 
            'Furnitures & Home Decors',
            'Digital & Electronics',
            'Tools & Equipments',
            'Kid’s Toys',
            'Organics & Spa'
            ]);
        $cat_slug = Str::slug($cat_name);
        return [
            'name' => $cat_name,
            'slug' => $cat_slug,
            'description' => $this->faker->text(300),
        ];
    }
}
