<?php

namespace Database\Factories\Users;

use App\Models\Users\Education;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Education::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titles = [
            'Certificate', 'B.A', 'BArch', 'BM', 'BFA',
            'B.Sc', 'M.A', 'M.B.A', 'MFA', 'M.Sc', 'J.D',
            'M.D', 'Ph.D', 'LLB', 'LLM', 'Other'
        ];
        return [
            'country' => $this->faker->country(),
            'university' => 'University',
            'title' => $titles[rand(0, 15)],
            'title_name' => $this->faker->text(30),
            'graduation' => $this->faker->year(),
            'user_id' => rand(1, 20)
        ];
    }
}
