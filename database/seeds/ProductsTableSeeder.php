<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Women
        for ($i = 0; $i <= 4; $i++) {
            Product::create([
                'name'          =>  'Women '.$i,
                'slug'          =>  'Women-'.$i,
                'image'         =>  'womens-shirt.jpg',
                'description'   =>  [13, 14, 15][array_rand([13, 14, 15])]. ' inch, '. [1, 2, 3][array_rand([1, 2, 3])] . ' 1TB SSD 32GB RAM',
                'price'         =>  rand(14999, 24999),
                'category_id'   =>  1,
                'admin_id'      =>  rand(1, 4),
            ]);
        }

        // Men
        for ($i = 0; $i <= 4; $i++) {
            Product::create([
                'name'          =>  'Men '.$i,
                'slug'          =>  'Men-'.$i,
                'image'         =>  'men-wear.jpg',
                'description'   =>  [23, 24, 27][array_rand([23, 24, 27])]. ' inch, '. [1, 2, 3][array_rand([1, 2, 3])] . ' 1TB SSD 32GB RAM',
                'price'         =>  rand(14999, 24999),
                'category_id'   =>  2,
                'admin_id'      =>  rand(1, 4),
            ]);
        }

        // Kids
        for ($i = 0; $i <= 4; $i++) {
            Product::create([
                'name'          =>  'Kids '.$i,
                'slug'          =>  'Kids-'.$i,
                'image'         =>  'kids-wear.jpg',
                'description'   =>  [3, 2, 1][array_rand([1, 2, 3])]. ' inch, '. [1, 2, 3][array_rand([1, 2, 3])] . ' 1TB SSD 32GB RAM',
                'price'         =>  rand(14999, 24999),
                'category_id'   =>  3,
                'admin_id'      =>  rand(1, 4),
            ]);
        }

        // Electronics
        for ($i = 0; $i <= 4; $i++) {
            Product::create([
                'name'          =>  'Electronics '.$i,
                'slug'          =>  'electronics-'.$i,
                'image'         =>  'mouse.jpg',
                'description'   =>  [3, 2, 1][array_rand([1, 2, 3])]. ' inch, '. [1, 2, 3][array_rand([1, 2, 3])] . ' 1TB SSD 32GB RAM',
                'price'         =>  rand(14999, 24999),
                'category_id'   =>  4,
                'admin_id'      =>  rand(1, 4),
            ]);
        }

        // Computing
        for ($i = 0; $i <= 4; $i++) {
            Product::create([
                'name'          =>  'Computing '.$i,
                'slug'          =>  'computing-'.$i,
                'image'         =>  'washing-machine.jpg',
                'description'   =>  [3, 2, 1][array_rand([1, 2, 3])]. ' inch, '. [1, 2, 3][array_rand([1, 2, 3])] . ' 1TB SSD 32GB RAM',
                'price'         =>  rand(14999, 24999),
                'category_id'   =>  5,
                'admin_id'      =>  rand(1, 4),
            ]);
        }

        // Gaming
        for ($i = 0; $i <= 4; $i++) {
            Product::create([
                'name'          =>  'Gaming '.$i,
                'slug'          =>  'gaming-'.$i,
                'image'         =>  'FIFA20.jpg',
                'description'   =>  [3, 2, 1][array_rand([1, 2, 3])]. ' inch, '. [1, 2, 3][array_rand([1, 2, 3])] . ' 1TB SSD 32GB RAM',
                'price'         =>  rand(14999, 24999),
                'category_id'   =>  6,
                'admin_id'      =>  rand(1, 4),
            ]);
        }

    }
}
