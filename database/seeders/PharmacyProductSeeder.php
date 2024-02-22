<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Pharmacy;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PharmacyProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <30 ; $i++) { 
            $product = Product::factory()
            ->hasAttached(
                Pharmacy::factory(),
                [ 
                    'pharmacy_id'=> Pharmacy::all()->random()->id,
                    'product_id'=> 50000,
                     'price' => fake()->numberBetween(21,30),
                    'quantity'=>fake()->numberBetween(0,1000)
                    ]
            )
            ->create();    
        }
       
    }
}
