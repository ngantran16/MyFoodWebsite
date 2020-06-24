<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
	            'id' => 1,
	            'name'=> 'BANH MI',
            ],[
                'id' => 2,
	            'name'=> 'COM DIA',
            ],[
                'id' => 3,
	            'name'=> 'MON CHAY',
            ],[
                'id' => 4,
	            'name'=> 'BUN PHO',
            ]
            ]);
    }
}
