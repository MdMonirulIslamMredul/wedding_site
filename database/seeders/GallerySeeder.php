<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = \App\Models\GalleryCategory::all();
        
        foreach ($categories as $category) {
            for ($i = 1; $i <= 3; $i++) {
                \App\Models\Gallery::create([
                    'gallery_category_id' => $category->id,
                    'details' => $category->name . ' Photo ' . $i,
                    'image' => 'done.jpg',
                    'is_active' => 1,
                ]);
            }
        }
    }
}
