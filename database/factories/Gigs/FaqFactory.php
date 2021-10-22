<?php

namespace Database\Factories\Gigs;

use App\Models\Gigs\Faq;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Faq::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question' => $this->faker->sentence,
            'answer' => $this->faker->text(rand(100, 300)),
            'gig_id' => rand(1, 30)
        ];
    }
}
