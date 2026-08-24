<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VideoGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videos = [
            [
                'title' => 'Sarah & Michael - A Tuscan Dream Wedding',
                'youtube_link' => 'https://www.youtube.com/watch?v=LXb3EKWsInQ', // Sample beautiful video
                'is_active' => 1,
            ],
            [
                'title' => 'Emily & James - Sunset Romance in the City',
                'youtube_link' => 'https://www.youtube.com/watch?v=J---aiyznGQ', // Sample video
                'is_active' => 1,
            ],
            [
                'title' => 'David & Victoria - Coastal Elegance',
                'youtube_link' => 'https://www.youtube.com/watch?v=tO01J-M3g0U', // Sample video
                'is_active' => 1,
            ],
            [
                'title' => 'Sophia & Alexander - Royal Heritage',
                'youtube_link' => 'https://www.youtube.com/watch?v=q6g4hT7Wp4Y', // Sample video
                'is_active' => 1,
            ]
        ];

        foreach ($videos as $video) {
            \App\Models\VideoGallery::create($video);
        }
    }
}
