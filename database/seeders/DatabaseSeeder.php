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
            'slug' => 'free-fire'
        ]);
        Category::create([
            'name' => 'Mobile Legends',
            'img' => '/img/game/mlbb.jpg',
            'slug' => 'mobile-legends'
        ]);
        Category::create([
            'name' => 'PUBG',
            'img' => '/img/game/pubgm.jpg',
            'slug' => 'pubg-mobile'
        ]);
        Category::create([
            'name' => 'Ragnarok M',
            'img' => '/img/game/ragnarok.jpg',
            'slug' => 'ragnarok'
        ]);
        Category::create([
            'name' => 'Google Play',
            'img' => '/img/game/google_play.jpg',
            'slug' => 'google-play'
        ]);
        Category::create([
            'name' => 'Garena',
            'img' => '/img/game/garena.jpg',
            'slug' => 'garena'
        ]);
        Category::create([
            'name' => 'Megaxus',
            'img' => '/img/game/megaxus.jpg',
            'slug' => 'megaxus'
        ]);
        Category::create([
            'name' => 'PlayStation Card',
            'img' => '/img/game/ps.jpg',
            'slug' => 'play-station'
        ]);
        Category::create([
            'name' => 'Steam Wallet IDR',
            'img' => '/img/game/steam.jpg',
            'slug' => 'steam-wallet'
        ]);
        Category::create([
            'name' => 'Point Blank Zepetto',
            'img' => '/img/game/pb.jpg',
            'slug' => 'point-blank'
        ]);
        Category::create([
            'name' => 'Arena Of Valor',
            'img' => '/img/game/aov.jpg',
            'slug' => 'aov'
        ]);
        Category::create([
            'name' => 'Call Of Duty',
            'img' => '/img/game/codm.jpg',
            'slug' => 'call-of-duty'
        ]);
        Category::create([
            'name' => 'Hago',
            'img' => '/img/game/hago.jpg',
            'slug' => 'hago'
        ]);
        Category::create([
            'name' => 'Razer Gold',
            'img' => '/img/game/razer_gold.jpg',
            'slug' => 'razer-gold'
        ]);
        Category::create([
            'name' => 'Cherry Credits',
            'img' => '/img/game/cherry_credit.jpg',
            'slug' => 'cherry-credits'
        ]);
    }
}
