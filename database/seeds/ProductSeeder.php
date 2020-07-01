<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
	            'id' => 1,
	            'name'=> 'BANH MI HEO QUAY',
	            'image'=> 'public/image1.jpg',
	            'price' => 69000,
                'quantity'=> 20,
                'star' => 4,
                'sale' =>20,
                'category_id'=> 1
            ],[
                'id' => 2,
	            'name'=> 'BANH MI BO KHO',
	            'imge'=> 'public/image2.jpg',
                'price' => 79000,
                'quantity'=> 20,
                'star' => 4,
                'sale' =>30,
                'category_id'=> 1
            ],[
                'id' => 3,
	            'name'=> 'BANH MI CHA LUA',
	            'imge'=> 'public/image3.jpg',
                'price' => 89000,
                'quantity'=> 20,
                'star' => 4,
                'sale' =>50,
                'category_id'=> 1
            ],[
                'id' => 4,
	            'name'=> 'COM GA XE',
	            'imge'=> 'public/image4.jpg',
                'price' => 99000,
                'quantity'=> 20,
                'star' => 4,
                'sale' =>40,
                'category_id'=> 2
            ],[
                'id' => 5,
	            'name'=> 'COM NEM NUONG',
	            'imge'=> 'public/image5.jpg',
                'price' => 99000,
                'quantity'=> 20,
                'star' => 5,
                'sale' =>20,
                'category_id'=> 2
            ],[
                'id' => 6,
	            'name'=> 'BUN CHA CA',
	            'imge'=> 'public/image6.jpg',
                'price' => 50000,
                'quantity'=> 20,
                'star' => 5,
                'sale' =>10,
                'category_id'=> 4
            ],[
                'id' => 7,
	            'name'=> 'PHO BO',
	            'imge'=> 'public/image7.jpg',
                'price' => 60000,
                'quantity'=> 20,
                'star' => 5,
                'sale' =>20,
                'category_id'=> 4
            ],[
                'id' => 8,
	            'name'=> 'PHO CHAY',
	            'imge'=> 'public/image8.jpg',
                'price' => 80000,
                'quantity'=> 20,
                'star' => 5,
                'sale' =>30,
                'category_id'=> 4
            ],[
                'id' => 9,
	            'name'=> 'COM CHAY HA NOI',
	            'imge'=> 'public/image9.jpg',
                'price' => 90000,
                'quantity'=> 20,
                'star' => 5,
                'sale' =>50,
                'category_id'=> 3
            ],[
                'id' => 10,
	            'name'=> 'COM CHAY XU HUE',
	            'imge'=> 'public/image10.jpg',
                'price' => 100000,
                'quantity'=> 20,
                'star' => 5,
                'sale' =>60,
                'category_id'=> 3
            ]
            ]);
    }
}
