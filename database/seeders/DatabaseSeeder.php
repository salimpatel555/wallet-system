<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
    //     // User::factory(10)->create();

    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);
    // }

    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'David', 'email' => 'david@gmail.com', 'password' => '$2y$12$5Ww1wxaPk4HougV1yU/5Zu0uWNRIvIhDlaW9HDx81xXrK7x7dOEAa'],
            ['name' => 'Rohit', 'email' => 'rohit@gmail.com', 'password' => '$2y$12$J10EVoPJzBikiwAkfPgGL.FKgXOTBKMleEba0x2t5WeN7UtBbPLXO'],
        ]);

        DB::table('wallets')->insert([
            ['user_id' => 1, 'balance' => 150.00],
            ['user_id' => 2, 'balance' => 50.00],
        ]);

        DB::table('transactions')->insert([
            ['sender_id' => 1, 'receiver_id' => 2, 'amount' => 50.00],
            ['sender_id' => 1, 'receiver_id' => 2, 'amount' => 10.00],
            ['sender_id' => 2, 'receiver_id' => 1, 'amount' => 100.00],
            ['sender_id' => 2, 'receiver_id' => 1, 'amount' => 10.00],
        ]);
    }

}
