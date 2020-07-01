<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Discount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++)
        {
            $discount = new Discount;
            $discount->code = strtoupper(Str::random(10));
            $discount->sale = $faker->numberBetween(5,80);
            $discount->save();
        }
    }
}
