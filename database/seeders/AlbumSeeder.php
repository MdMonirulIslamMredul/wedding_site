<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\AlbumPicture;
use Illuminate\Support\Facades\Schema;

class AlbumSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        AlbumPicture::truncate();
        Album::truncate();
        Schema::enableForeignKeyConstraints();

        // Album 1: Kaynat & Haseeb Reception
        $album1 = Album::create([
            'title' => 'KAYNAT & HASEEB – RECEPTION',
            'details' => 'A beautiful reception celebrating the union of Kaynat and Haseeb. Captured with love and elegance.',
            'cover_image' => 'wedding_1.png',
            'is_active' => 1
        ]);

        AlbumPicture::create(['album_id' => $album1->id, 'image' => 'wedding_1.png']);
        AlbumPicture::create(['album_id' => $album1->id, 'image' => 'wedding_2.png']);
        AlbumPicture::create(['album_id' => $album1->id, 'image' => 'slider1.png']);
        AlbumPicture::create(['album_id' => $album1->id, 'image' => 'slider2.png']);
        AlbumPicture::create(['album_id' => $album1->id, 'image' => 'slider3.png']);

        // Album 2: Subah & Saif Mehendi
        $album2 = Album::create([
            'title' => 'SUBAH & SAIF – PRE-WEDDING',
            'details' => 'Pre-wedding moments filled with joy, laughter, and stunning scenery.',
            'cover_image' => 'pre_wedding_1.png',
            'is_active' => 1
        ]);

        AlbumPicture::create(['album_id' => $album2->id, 'image' => 'pre_wedding_1.png']);
        AlbumPicture::create(['album_id' => $album2->id, 'image' => 'slider4.png']);

        // Album 3: Editorial Shoot
        $album3 = Album::create([
            'title' => 'BRIDAL EDITORIAL – SUMMER 2026',
            'details' => 'Fashion and elegance meet in this stunning bridal editorial shoot.',
            'cover_image' => 'editorials_1.png',
            'is_active' => 1
        ]);

        AlbumPicture::create(['album_id' => $album3->id, 'image' => 'editorials_1.png']);

        // Album 4: Birthday Celebration
        $album4 = Album::create([
            'title' => 'ARIANA 18TH BIRTHDAY',
            'details' => 'A grand celebration marking Ariana\'s 18th birthday.',
            'cover_image' => 'birthday_1.png',
            'is_active' => 1
        ]);

        AlbumPicture::create(['album_id' => $album4->id, 'image' => 'birthday_1.png']);
    }
}
