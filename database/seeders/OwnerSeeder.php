<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('owners')->insert([
            [
                'name' => '青木',
                'email' => 'test@test.com',
                'password' => Hash::make('password'),
                'address'=>'https://twitter.com/aoki_monpro',
                'tel'=>'xxx'
            ],
            [
                'name' => '草山',
                'email' => 'test1@test.com',
                'password' => Hash::make('password'),
                'address'=>'地球',
                'tel'=>'xxx_yyy_zzz'
            ],
        ]);
    }
}
