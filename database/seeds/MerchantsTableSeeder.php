<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class MerchantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Admin::insert([
            ['name' => 'John Doe','phone_number' => '08165544525', 'email' => 'johndoe@example.com', 'created_at' => $now, 'updated_at' => $now, 'password' => Hash::make('passcode')],
            ['name' => 'Ayobami Aladenoye', 'phone_number' => '08130666097', 'email' => 'hennessey.io@example.org', 'created_at' => $now, 'updated_at' => $now, 'password' => Hash::make('password')],
            ['name' => 'Daniel Obiora', 'phone_number' => '08105706949', 'email' => 'obizzy98@example.com', 'created_at' => $now, 'updated_at' => $now, 'password' => Hash::make('password')],
            ['name' => 'Femi Ayodeji Sunday', 'phone_number' => '08123456789', 'email' => 'femi.instincts@example.net', 'created_at' => $now, 'updated_at' => $now, 'password' => Hash::make('passcode')],
        ]);
    }
}
