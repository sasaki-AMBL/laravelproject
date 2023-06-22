<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name' => '佐々木',
                'email' => 'test3@test.com',
                'password' => Hash::make('password'),
                'address'=>'地球',
                'tel'=>'aaa_bbb_ccc'
            ],
            [
                'name' => '森本',
                'email' => 'test4@test.com',
                'password' => Hash::make('password'),
                'address'=>'地球',
                'tel'=>'ddd_eee_fff'
            ],
        ]);

    }
}
