<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            ['name'=>'本'],
            ['name'=>'電子機器'],
            ['name'=>'日用品'],
            ['name'=>'服'],
            ['name'=>'食品'],
            ['name'=>'DVD'],
        ]);
    }
}
