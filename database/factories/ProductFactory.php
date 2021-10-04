<?php

namespace Database\Factories;

use App\Models\Product;
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
        return [
            'name'=>$this->faker->colorName,
            'img_url'=>$this->faker->imageUrl,
            'description'=>$this->faker->realTextBetween('10','100'),
            'price'=>$this->faker->numberBetween(10000,100000),
            'category_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9,10])
        ];
    }
}
