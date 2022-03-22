<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => 'admin@pupdates.com',
            'password' => bcrypt('password'),
        ]);
        User::factory()->count(50)->hasPets(2)->create();
    }
}
