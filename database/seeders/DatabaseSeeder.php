<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Category
        Category::create([
            'name' => 'Free Fire',
            'img' => '/img/game/free_fire.png',
            'slug' => 'free-fire',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Mobile Legends',
            'img' => '/img/game/mlbb.jpg',
            'slug' => 'mobile-legends',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'PUBG',
            'img' => '/img/game/pubgm.jpg',
            'slug' => 'pubg-mobile',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Ragnarok M',
            'img' => '/img/game/ragnarok.jpg',
            'slug' => 'ragnarok',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Garena',
            'img' => '/img/game/garena.jpg',
            'slug' => 'garena',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Point Blank Zepetto',
            'img' => '/img/game/pb.jpg',
            'slug' => 'point-blank',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Arena Of Valor',
            'img' => '/img/game/aov.jpg',
            'slug' => 'aov',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Call Of Duty',
            'img' => '/img/game/codm.jpg',
            'slug' => 'call-of-duty',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Speed Drifter',
            'img' => '/img/game/speeddrft.webp',
            'slug' => 'speed-drifter',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Saussage Man',
            'img' => '/img/game/saussage.webp',
            'slug' => 'saussage-man',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Ride Out Heroes',
            'img' => '/img/game/rohero.webp',
            'slug' => 'ride-out-heroes',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Life After',
            'img' => '/img/game/lifeafter.webp',
            'slug' => 'life-after',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Genshin Impact',
            'img' => '/img/game/genshin.webp',
            'slug' => 'genshin-impact',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Love Nikki',
            'img' => '/img/game/lovenikki.webp',
            'slug' => 'love-nikki',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Laplace M',
            'img' => '/img/game/laplace.webp',
            'slug' => 'laplace-m',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Lost Saga',
            'img' => '/img/game/lostsaga.jpg',
            'slug' => 'lost-saga',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Dragon Nest',
            'img' => '/img/game/dragonnest.webp',
            'slug' => 'dragon-nest',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Dragon Raja',
            'img' => '/img/game/dragonraja.webp',
            'slug' => 'dragon-nest',
            'tipe' => 'game'
        ]);
        Category::create([
            'name' => 'Steam Wallet IDR',
            'img' => '/img/voucher/steam.jpg',
            'slug' => 'steam-wallet',
            'tipe' => 'voucher'
        ]);
        User::create([
            'email' => 'demo@demo.com',
            'password' => bcrypt('password'),
            'name' => 'Demo',
            'api_key' => bcrypt('demo@demo.compassword')
        ]);
        User::create([
            'email' => 'demo1@demo.com',
            'password' => bcrypt('password'),
            'name' => 'Demo',
            'api_key' => bcrypt('demo1@demo.compassword')
        ]);
    }
}
