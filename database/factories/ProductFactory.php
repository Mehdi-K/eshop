<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $prod_name = $this->faker->unique()->words($nb = 3, $asText = true);
        $prod_slug = Str::slug($prod_name);
        $cat = 9;
        return [
            'name' => $prod_name,
            'slug' => $prod_slug,
            'SKU' => 'DiGi-' . $this->faker->unique()->numberBetween(100000,500000),
            'short_description' => $this->faker->text(100),
            'description' => $this->faker->text(600),
            'weight' => $this->faker->numberBetween(1,20),
            'colors' => $this->faker->randomElement([
                'Red', 'Yellow', 'Black', 'Blue', 'Grey', 'Pink', 'white'
                ]),
            'dimensions' => 'Width:'.$this->faker->numberBetween(3,200).
                         'cm; Length:'.$this->faker->numberBetween(3,200).
                         'cm; Hight:'.$this->faker->numberBetween(3,200) , 
            'size' => $this->faker->randomElement([
                'XS', 'S', 'M', 'L', 'XL', 'XXL', 
                ]),
            'price' => $this->faker->numberBetween(100,500),
            'stuck_status' => 'instuck',
            'quantity' => $this->faker->numberBetween(120,360),
            'image' => 'tools_equipment_'.$this->faker->unique()->numberBetween(1,7).'.jpg',
            'category_id' => $cat, 
        ];
    }
}
