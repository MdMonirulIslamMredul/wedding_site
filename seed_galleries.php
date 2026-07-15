<?php
use App\Models\GalleryCategory;
use App\Models\Gallery;

// Ensure Categories exist
$categoriesData = ['Weddings', 'Pre-Wedding', 'Editorials', 'Birthday'];
$categoryIds = [];

// Clear existing categories and galleries
Gallery::truncate();
GalleryCategory::truncate();

foreach ($categoriesData as $name) {
    $cat = GalleryCategory::create([
        'name' => $name,
        'is_active' => 1
    ]);
    $categoryIds[$name] = $cat->id;
}

// Insert Galleries
$galleries = [
    [
        'category' => 'Weddings',
        'image' => 'wedding_1.png'
    ],
    [
        'category' => 'Weddings',
        'image' => 'wedding_2.png'
    ],
    [
        'category' => 'Pre-Wedding',
        'image' => 'pre_wedding_1.png'
    ],
    [
        'category' => 'Editorials',
        'image' => 'editorials_1.png'
    ],
    [
        'category' => 'Birthday',
        'image' => 'birthday_1.png'
    ],
];

foreach ($galleries as $g) {
    Gallery::create([
        'gallery_category_id' => $categoryIds[$g['category']],
        'image' => $g['image'],
        'is_active' => 1
    ]);
}

echo "Database seeded successfully!\n";
