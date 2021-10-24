<?php

namespace Database\Factories;

use App\Models\Gig;
use App\Models\Gigs\Package;
use App\Models\Gigs\Requirement;
use Illuminate\Database\Eloquent\Factories\Factory;

class GigFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gig::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function addPackages(Gig $gig)
    {

        $packages = ['Basic', 'Standard', 'Premium'];

        for ($i = 0; $i <= 2; $i++) {
            $row = [
                'name' => $packages[$i],
                'excerpt' => $this->faker->text(rand(30, 50)),
                'delivery_time' => rand(1, 5),
                'price' => rand(5, 150),
                'revisions' => rand(-1, 10),
                'gig_id' => $gig->id,
            ];
            $data[] = $row;
        }
        Package::insert($data);
    }

    public function addRequeriments(Gig $gig)
    {

        $data = [];

        for ($i = 0; $i <= 3; $i++) {
            $row = [
                'type' => rand(1, 2),
                'question' => $this->faker->text(rand(100, 200)),
                'gig_id' => $gig->id,
            ];
            $data[] = $row;
        }
        Requirement::insert($data);

    }

    public function configure()
    {
        return $this->afterCreating(function (Gig $gig) {
            $this->addPackages($gig);
            $this->addRequeriments($gig);
        });
    }

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'featured_image' => "https://picsum.photos/1200/720?random=" . mt_rand(1, 55000),
            'description' => $this->faker->realText(1200, 3),
            'status' => rand(0, 2),
            'user_id' => rand(1, 20),
            'category_id' => rand(1, 5),
            'sub_category_id' => rand(1, 5),
        ];
    }
}
