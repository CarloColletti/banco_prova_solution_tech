<?php

namespace Modules\Product\Database\Seeders;

use App\Modules\Product\Database\Seeders\ProductSeederTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call([

        //     ProductSeederTableSeeder::class,
        // ]);
    }
}
