<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomNumber(),
            'description' => $this->faker->realText(),
            'amount' => rand(1,20),
            'img' => $this->faker->imageUrl('https://www.google.com/search?q=h%C3%ACnh+%E1%BA%A3nh+n%E1%BB%99i+th%E1%BA%A5t&rlz=1C1UEAD_viVN989VN989&source=lnms&tbm=isch&sa=X&ved=2ahUKEwjGrZDFxJD5AhUmRmwGHUXXBr4Q_AUoAXoECAEQAw&biw=1536&bih=722&dpr=1.25#imgrc=pqTMc5gxuPFLFM'),
            'height' => $this->faker->randomNumber(),
            'width' => $this->faker->randomNumber(),
            'status' => rand(1,2),
            'size_id' => rand(7,9),
            'sector_id' => rand(1,10)
        ];
    }
}
