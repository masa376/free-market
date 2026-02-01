<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        $categoryIds = Category::pluck('id');
        $conditionMap = Condition::pluck('id', 'item_condition');

        $rawItems = [
            [
                'name' => '腕時計',
                'price' => 15000,
                'brands' => 'Rolax',
                'description' => 'スタイリッシュなデザインのメンズ腕時計',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Armani+Mens+Clock.jpg',
                'condition_text' => '良好',
            ],
            [
                'name' => 'HDD',
                'price' => 5000,
                'brands' => '西芝',
                'description' => '高速で信頼性の高いハードディスク',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/HDD+Hard+Disk.jpg',
                'condition_text' => '目立った傷や汚れなし',
            ],
            [
                'name' => '玉ねぎ3束',
                'price' => 300,
                'brands' => 'なし',
                'description' => '新鮮な玉ねぎ3束のセット',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/iLoveIMG+d.jpg',
                'condition_text' => 'やや傷や汚れあり',
            ],
            [
                'name' => '革靴',
                'price' => 4000,
                'brands' => '',
                'description' => 'クラシックなデザインの革靴',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Leather+Shoes+Product+Photo.jpg',
                'condition_text' => '状態が悪い',
            ],
            [
                'name' => 'ノートPC',
                'price' => 45000,
                'brands' => '',
                'description' =>'高性能なノートパソコン',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Living+Room+Laptop.jpg',
                'condition_text' => '良好',
            ],
            [
                'name' => 'マイク',
                'price' => 8000,
                'brands' => 'なし',
                'description' =>'高音質のレコーディング用マイク',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Music+Mic+4632231.jpg',
                'condition_text' => '目立った傷や汚れなし',
            ],
            [
                'name' => 'ショルダーバック',
                'price' => 3500,
                'brands' => '',
                'description' =>'おしゃれなショルダーバッグ',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Purse+fashion+pocket.jpg',
                'condition_text' => 'やや傷や汚れあり',
            ],
            [
                'name' => 'タンブラー',
                'price' => 500,
                'brands' => 'なし',
                'description' =>'使いやすいタンブラー',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Tumbler+souvenir.jpg',
                'condition_text' => '状態が悪い',
            ],
            [
                'name' => 'コーヒーミル',
                'price' => 4000,
                'brands' => 'Starbacks',
                'description' =>'手動のコーヒーミル',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Waitress+with+Coffee+Grinder.jpg',
                'condition_text' => '良好',
            ],
            [
                'name' => 'メイクセット',
                'price' => 2500,
                'brands' => '',
                'description' =>'便利なメイクアップセット',
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/%E5%A4%96%E5%87%BA%E3%83%A1%E3%82%A4%E3%82%AF%E3%82%A2%E3%83%83%E3%83%95%E3%82%9A%E3%82%BB%E3%83%83%E3%83%88.jpg',
                'condition_text' => '目立った傷や汚れなし',
            ],
        ];

        foreach ($rawItems as $data) {
            Item::create([
                'image' => $data['image'],
                'user_id' => $user->id,
                'seller_id' => $user->id,
                'buyer_id' => null,
                'category_id' => $categoryIds->random(),
                'condition_id' => $conditionMap[$data['condition_text']] ?? $conditionMap['良好'],
                'name' => $data['name'],
                'brands' => $data['brands'],
                'description' => $data['description'],
                'price' => $data['price'],
            ]);
        }
    }
}
