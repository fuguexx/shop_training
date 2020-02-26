<?php

use Faker\Factory as Fake;
use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin_users')->insert([
            'name' => 'オーナー',
            'email' => 'owner@a.com',
            'password' => Hash::make('pass'),
            'is_owner' => true,
            'created_at' => new Datetime(),
        ]);
        $fake = Fake::create('ja_JP');
        for ($i = 0; $i < 10; $i++) {
            DB::table('admin_users')->insert([
                'name' => $fake->name,
                'email' => $fake->email,
                'password' => Hash::make('pass'),
                'is_owner' => $fake->boolean,
                'created_at' => new Datetime(),
            ]);
        }
    }
}
