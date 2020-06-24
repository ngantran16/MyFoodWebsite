<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('details')->insert([
            [
	            'product_id' => 1,
	            'content'=> 'Banh mi cha lua is a classic Vietnamese sandwich that you will find almost everywhere on the streets of Vietnam. Full of fresh ingredients such as steamed pork sausages wrapped in banana leaves, marinated carrots/turnips, red onions, cucumbers, red peppers, coriander.',
            ],[
                'product_id' => 2,
	            'content'=> 'Banh mi cha lua is a classic Vietnamese sandwich that you will find almost everywhere on the streets of Vietnam. Full of fresh ingredients such as steamed pork sausages wrapped in banana leaves, marinated.',
            ],[
                'product_id' => 3,
	            'content'=> 'Banh mi cha lua is a classic Vietnamese sandwich that you will find almost everywhere on the streets of Vietnam. Full of fresh ingredients such as steamed pork sausages wrapped in banana leaves, marinated.',
            ],[
                'product_id' => 4,
	            'content'=> 'Banh mi cha lua is a classic Vietnamese sandwich that you will find almost everywhere on the streets of Vietnam. Full of fresh ingredients such as steamed pork sausages wrapped in banana leaves, marinated.',
            ],[
                'product_id' => 5,
	            'content'=> 'Banh mi cha lua is a classic Vietnamese sandwich that you will find almost everywhere on the streets of Vietnam. Full of fresh ingredients such as steamed pork sausages wrapped in banana leaves, marinated.',
            ],[
                'product_id' => 6,
	            'content'=> 'Banh mi cha lua is a classic Vietnamese sandwich that you will find almost everywhere on the streets of Vietnam. Full of fresh ingredients such as steamed pork sausages wrapped in banana leaves, marinated.',
            ],[
                'product_id' => 7,
	            'content'=> 'Banh mi cha lua is a classic Vietnamese sandwich that you will find almost everywhere on the streets of Vietnam. Full of fresh ingredients such as steamed pork sausages wrapped in banana leaves, marinated.',
            ],[
                'product_id' => 8,
	            'content'=> 'Banh mi cha lua is a classic Vietnamese sandwich that you will find almost everywhere on the streets of Vietnam. Full of fresh ingredients such as steamed pork sausages wrapped in banana leaves, marinated.',
            ],[
                'product_id' => 9,
	            'content'=> 'Banh mi cha lua is a classic Vietnamese sandwich that you will find almost everywhere on the streets of Vietnam. Full of fresh ingredients such as steamed pork sausages wrapped in banana leaves, marinated.',
            ],[
                'product_id' => 10,
	            'content'=> 'Banh mi cha lua is a classic Vietnamese sandwich that you will find almost everywhere on the streets of Vietnam. Full of fresh ingredients such as steamed pork sausages wrapped in banana leaves, marinated.',
            ]
            ]);
    }
}
