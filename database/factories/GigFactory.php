<?php

namespace Database\Factories;

use App\Models\Gig;
use App\Models\User;
use App\Models\Gigs\{Package, Requirement, Order, Rating};
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
            $package = Package::create($row);
            $this->addOrders($gig, $package);
        }
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

    public function addOrders(Gig $gig, Package $package)
    {

        $rand_orders = rand(1, 15);
        $users = User::where('id', '!=', $gig->user_id)->get('id');

        for ($i = 0; $i <= $rand_orders; $i++) {
            $buyer = $users[rand(1, 18)];
            $row = [
                'status' => 1,
                'amount' => $package->price,
                'seller_id' => $gig->user_id,
                'buyer_id' => $buyer->id,
                'package_id' => $package->id,
                'gig_id' => $gig->id,
            ];
            $order = Order::create($row);
            $this->addRatings($order);
        }

    }

    public function addRatings(Order $order)
    {

        $data = [];
        $rating_type = ['seller', 'buyer'];

        for ($e=0; $e <= 1; $e++) { 
            $row = [
                'comment' => $this->faker->text(),
                'rating_type' => $rating_type[$e],
                'rating' => rand(3, 5),
                'seller_id' => $order->seller_id,
                'buyer_id' => $order->buyer_id,
                'order_id' => $order->id,
            ];
            $data[] = $row;
        }

        Rating::insert($data);

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
