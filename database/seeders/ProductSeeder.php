<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'خشک کن سریع روتاری',
            'category' => 'motion',
            'description' => 'Some description about the product',
            'image' => 'image-24.jpg',
        ]);
    }
}
