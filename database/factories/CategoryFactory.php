<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
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
     * Define method after creation.
     *
     * @return array
     */
     
    public function configure()
    {
        
        return $this->afterCreating(function (Category $category) {
            $category_list = [
                'social networks',
                'ios',
                'business analytics',
                'aws',
                'plugins',
            ];
            $name = $category_list[$category->id - 1];
            SubCategory::create([
                'name' => $name,
                'category_id' => $category->id
            ]);

        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    public function definition()
    {
        $category_list = [
            'web apps',
            'mobile apps',
            'data science',
            'cloud services',
            'wordpress',
        ];

        return [
            'name' => $category_list[rand(0, 4)]
        ];
    }
}
