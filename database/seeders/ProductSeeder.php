<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $products = [
            ['name' => 'Wireless Mouse', 'price' => 699.00, 'description' => 'Ergonomic wireless mouse with adjustable DPI.'],
            ['name' => 'Gaming Keyboard', 'price' => 1499.00, 'description' => 'Mechanical RGB gaming keyboard with blue switches.'],
            ['name' => 'Bluetooth Speaker', 'price' => 1299.00, 'description' => 'Portable Bluetooth speaker with 10-hour battery.'],
            ['name' => 'Smart Watch', 'price' => 2999.00, 'description' => 'Water-resistant smart watch with heart-rate tracking.'],
            ['name' => 'Laptop Stand', 'price' => 499.00, 'description' => 'Aluminum adjustable laptop stand for better posture.'],
            ['name' => 'USB-C Hub', 'price' => 999.00, 'description' => 'Multi-port USB-C hub with HDMI and card reader.'],
            ['name' => 'Noise Cancelling Headphones', 'price' => 3499.00, 'description' => 'Over-ear headphones with active noise cancellation.'],
            ['name' => 'Fitness Tracker', 'price' => 1299.00, 'description' => 'Track steps, sleep, and calories with this band.'],
            ['name' => 'External SSD 500GB', 'price' => 3499.00, 'description' => 'High-speed portable SSD for data transfer and backup.'],
            ['name' => '1080p Webcam', 'price' => 799.00, 'description' => 'HD webcam with built-in microphone.'],
            ['name' => 'LED Desk Lamp', 'price' => 599.00, 'description' => 'Touch control LED desk lamp with USB charging port.'],
            ['name' => 'Smartphone Tripod', 'price' => 399.00, 'description' => 'Flexible tripod stand compatible with all phones.'],
            ['name' => 'Portable Charger 10000mAh', 'price' => 999.00, 'description' => 'Fast charging power bank with dual output ports.'],
            ['name' => 'Wireless Earbuds', 'price' => 1999.00, 'description' => 'True wireless earbuds with charging case.'],
            ['name' => 'Laptop Bag 15.6"', 'price' => 1099.00, 'description' => 'Water-resistant, padded laptop bag with shoulder strap.'],
            ['name' => 'HDMI Cable 2M', 'price' => 199.00, 'description' => 'High-speed HDMI cable for 4K displays.'],
            ['name' => 'Smart LED Bulb', 'price' => 349.00, 'description' => 'WiFi-enabled LED bulb with color control.'],
            ['name' => 'Portable Fan', 'price' => 299.00, 'description' => 'USB rechargeable mini desk fan.'],
            ['name' => 'Wireless Charger Pad', 'price' => 599.00, 'description' => 'Qi-certified wireless charger for smartphones.'],
            ['name' => 'Laptop Cooling Pad', 'price' => 899.00, 'description' => 'Cooling pad with dual fans and blue LED.'],
        ];

        DB::table('products')->insert($products);
    }
}
