<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GalleryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Weddings', 'is_active' => 1],
            ['name' => 'Pre-Wedding', 'is_active' => 1],
            ['name' => 'Editorials', 'is_active' => 1],
        ];

        foreach ($categories as $category) {
            \App\Models\GalleryCategory::updateOrCreate(['name' => $category['name']], $category);
        }
    }
}
