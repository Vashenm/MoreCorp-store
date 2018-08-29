<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run() {
		//Create admin users
		DB::table('users')->insert([
			'name' => 'Admin One',
			'email' => 'admin1@gmail.com',
			'password' => app('hash')->make('admin'),
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
		]);

		DB::table('users')->insert([
			'name' => 'Admin Two',
			'email' => 'admin2@gmail.com',
			'password' => app('hash')->make('admin'),
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
		]);

		DB::table('users')->insert([
			'name' => 'Admin Three',
			'email' => 'admin3@gmail.com',
			'password' => app('hash')->make('admin'),
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
		]);

		DB::table('users')->insert([
			'name' => 'Admin Four',
			'email' => 'admin4@gmail.com',
			'password' => app('hash')->make('admin'),
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),
		]);
	}
}
