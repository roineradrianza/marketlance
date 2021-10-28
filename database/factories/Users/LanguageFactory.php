<?php

namespace Database\Factories\Users;

use App\Models\Users\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

class LanguageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Language::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $level = ['Basic', 'Conversational', 'Fluent', 'Native/Bilingual'];
        $languages = ['Spanish', 'English', 'Portuguese', 'Italian'];
        return [
            'name' => $languages[rand(0, 3)],
            'level' => $level[rand(0, 3)],
            'user_id' => rand(1, 20)
        ];
    }
}
