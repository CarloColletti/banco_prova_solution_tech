<?php

namespace App\Modules\Product\Database\Seeders;

use App\Modules\Product\Entities\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        // $new_product = new Product;

        // $new_product->creator_id = '4';
        // $new_product->name = 'pollo';
        // $new_product->type = 'pollo';
        // $new_product->weight = '12';
        // $new_product->height = '12';
        // $new_product->width = '12';
        // $new_product->depth = '21';
        // $new_product->stock_quntity = '12';

        // $new_product->price = 12.40;
        // $new_product->save();
    }
}
