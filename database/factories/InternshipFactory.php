<?php

namespace Database\Factories;

use App\Models\Internship;
use Illuminate\Database\Eloquent\Factories\Factory;

class InternshipFactory extends Factory
{
    protected $model = Internship::class;

    public function definition()
    {
        return [
            // $this->faker->name,
            'title'=>$this->faker->realTextBetween(10,20),
            'desc'=>$this->faker->realTextBetween(30,50),
            'content'=>$this->faker->realText(),
            'cover'=>$this->faker->imageUrl(),
            'slider_images'=>json_encode([
                $this->faker->imageUrl(),
                $this->faker->imageUrl(),
                $this->faker->imageUrl()
            ]),
            'cate_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9,10])
        ];
    }
}
