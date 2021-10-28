<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Database\Seeder;

class BioSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $row = [
                'user_id' => $i,
                'meta_name' => 'bio',
                'meta_val' => 'Lorem, ipsum dolor sit 
                amet consectetur adipisicing elit. Perspiciatis itaque praesentium ex obcaecati! 
                Illo harum explicabo esse rerum praesentium consectetur nobis, 
                tempora ipsa, iure quia molestiae odit veritatis atque eius.'
            ];
            UserMeta::create($row);
        }
    }
}
