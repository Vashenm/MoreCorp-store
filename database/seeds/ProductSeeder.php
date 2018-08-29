<?php

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
		DB::table('product')->insert([
			'name' => 'Product 1',
			'sku' => 'pro123',
			'price' => '200.00',
			'description' => 'This is product one description',
			'view_count' => '0',
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
		]);

		DB::table('product')->insert([
			'name' => 'Product 2',
			'sku' => 'pro245',
			'price' => '100.00',
			'description' => 'This is product two description',
			'view_count' => '0',
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
		]);


		DB::table('product')->insert([
			'name' => 'Product 3',
			'sku' => 'pro899',
			'price' => '58.30',
			'description' => 'This is product three description',
			'view_count' => '0',
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
		]);


		DB::table('product')->insert([
			'name' => 'Product 4',
			'sku' => 'pro568',
			'price' => '400.00',
			'description' => 'This is product four description',
			'view_count' => '0',
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
		]);


		DB::table('product')->insert([
			'name' => 'Product 5',
			'sku' => 'pro124',
			'price' => '20.99',
			'description' => 'This is product five description',
			'view_count' => '0',
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
		]);
    }
}
