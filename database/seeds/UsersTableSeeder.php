<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        User::insert([
            ['name' => 'John Doe', 'email' => 'johndoe@example.com', 'address' => 'University of Ibadan', 'phone_number' => '08012345678', 'created_at' => $now, 'updated_at' => $now, 'password' => Hash::make('passcode')],
            ['name' => 'Monique Bode MD', 'email' => 'gerhold.marcel@example.org', 'address' => 'University of Ibadan', 'phone_number' => '08012345678', 'created_at' => $now, 'updated_at' => $now, 'password' => Hash::make('password')],
            ['name' => 'Judge Homenick', 'email' => 'hziemann@example.com', 'address' => 'University of Ibadan', 'phone_number' => '08012345678', 'created_at' => $now, 'updated_at' => $now, 'password' => Hash::make('passcode')],
            ['name' => 'Prof. Heloise Metz', 'email' => 'jerald37@example.net', 'address' => 'University of Ibadan', 'phone_number' => '08012345678', 'created_at' => $now, 'updated_at' => $now, 'password' => Hash::make('password')],
        ]);
    }
}
