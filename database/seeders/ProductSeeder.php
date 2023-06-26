<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            ['name'=>'ハリーポッターと賢者の石',
             'price'=>'1000',
             'category_id'=>'1',
             'image'=>'',
             'owner_id'=>'1',
             'stock'=>'5',
             'display'=>'1',
            ],
            ['name'=>'TP-LINK-Wifiルーター',
            'price'=>'10000',
            'category_id'=>'2',
            'image'=>'',
            'owner_id'=>'1',
            'stock'=>'10',
            'display'=>'1',
            ],
            ['name'=>'シャンプー',
            'price'=>'500',
            'category_id'=>'3',
            'image'=>'',
            'owner_id'=>'1',
            'stock'=>'15',
            'display'=>'0',
            ],
            ['name'=>'アディダススニーカー',
            'price'=>'3000',
            'category_id'=>'4',
            'image'=>'',
            'owner_id'=>'2',
            'stock'=>'10',
            'display'=>'1',
            ],

            ['name'=>'一保堂 抹茶',
            'price'=>'2000',
            'category_id'=>'5',
            'image'=>'',
            'owner_id'=>'2',
            'stock'=>'20',
            'display'=>'1',
            ],

            ['name'=>'ONE PIECE FILM RED',
            'price'=>'16830',
            'category_id'=>'6',
            'image'=>'',
            'owner_id'=>'2',
            'stock'=>'30',
            'display'=>'1',
            ],
            ['name'=>'ヘッドホン',
            'price'=>'6000',
            'category_id'=>'2',
            'image'=>'',
            'owner_id'=>'1',
            'stock'=>'10',
            'display'=>'0',
            ],
            ['name'=>'傘',
            'price'=>'500',
            'category_id'=>'3',
            'image'=>'',
            'owner_id'=>'1',
            'stock'=>'25',
            'display'=>'1',
            ],
            ['name'=>'ティッシュ',
            'price'=>'250',
            'category_id'=>'3',
            'image'=>'',
            'owner_id'=>'1',
            'stock'=>'30',
            'display'=>'1',
            ],
            ['name'=>'氷菓',
            'price'=>'600',
            'category_id'=>'1',
            'image'=>'',
            'owner_id'=>'1',
            'stock'=>'10',
            'display'=>'1',
            ],


        ]);

    }
}
