<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Carbon\Carbon;
class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i = 1;$i<=100;$i++){
                Transaction::factory(5)->create(['user_id'=>$i]);
            }

        DB::table('transactions')->insert([
            [
                'user_id' => '101',
                'product_id' => '1',
                'amount' => '1',
                'price' => 1000,
                'created_at' => new Carbon(),
            ],
            [
                'user_id' => '101',
                'product_id' => '6',
                'amount' => '2',
                'price' => 10000,
                'created_at'=>new Carbon(),
            ],

        ]);
        }
}
