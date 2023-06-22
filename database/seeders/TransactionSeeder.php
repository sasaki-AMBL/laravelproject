<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('transactions')->insert([
            [
                'user_id' => '1',
                'product_id' => '1',
                'amount' => '1',
            ],
            [
                'user_id' => '2',
                'product_id' => '6',
                'amount' => '2',
            ],

        ]);
        }
}
