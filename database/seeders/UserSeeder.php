<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Badge, User};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
        ->hasAttached(Badge::factory()->count(2),
        [
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ])
        ->count(3)
        ->create();
    }
}
