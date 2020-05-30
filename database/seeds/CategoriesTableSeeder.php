<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $now = Carbon::now()->toDateTimeString();

        Category::insert([
             ['name' => 'Women', 'slug' => 'women', 'created_at' => $now, 'updated_at' => $now],
             ['name' => 'Men', 'slug' => 'men', 'created_at' => $now, 'updated_at' => $now],
             ['name' => 'Kids', 'slug' => 'kids', 'created_at' => $now, 'updated_at' => $now],
             ['name' => 'Electronics', 'slug' => 'electronics', 'created_at' => $now, 'updated_at' => $now],
             ['name' => 'Computing', 'slug' => 'computing', 'created_at' => $now, 'updated_at' => $now],
             ['name' => 'Gaming', 'slug' => 'gaming', 'created_at' => $now, 'updated_at' => $now],
        ]);
        //
    }
}
