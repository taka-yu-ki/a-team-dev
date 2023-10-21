<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'チーム開発会って？',
            'body' => 'チームで協力して一つの成果物を作るイベントです！メンバー全員で助け合いましょう！',
            'category_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        DB::table('posts')->insert([
            'title' => '役割分担',
            'body' => 'これはborderという、cssでつけることができる枠線です！'.PHP_EOL.'太さの指定や形など色々指定できるので、気になった方はコードを覗いてみたり、調べてみたりしましょう！'.PHP_EOL.'また、このプロジェクト内ではインラインCSSという、HTML内に書く簡易的なCSSを使用しています！こちらも気になった方は見てみてください！',
            'category_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        DB::table('posts')->insert([
            'title' => 'この枠線みたいなやつって何？',
            'body' => '開発を進める際は、役割分担をすると効率的に開発をすることができます！'.PHP_EOL.'具',
            'category_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
