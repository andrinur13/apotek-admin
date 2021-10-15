<?php

namespace Database\Seeders;

use App\Models\ProductModel;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        $product = [];

        for($i=0; $i<100; $i++) {
            $productTemp = [
                'nama_product' => $faker->name,
                'berat' => 10,
                'id_product_category' => range(2, 6),
                'harga_beli' => 1000,
                'harga_jual' => 2000
            ];

            foreach($productTemp as $pt) {
                echo $pt;
            }

            // array_push($product, $productTemp);
            // $product_model = new ProductModel();
            // $product_model->create($productTemp);
        }


    }
}
