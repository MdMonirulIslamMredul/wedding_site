<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('packages')->insert([
            [
                'name' => 'Gold',
                'price' => 'BDT 50K',
                'suffix' => '/ event',
                'is_popular' => 0,
                'features' => "1 Chief Photographer\n1 Senior Cinematographer\n4 Hours Coverage\n100 Edited Photos\n3-Min Cinematic Trailer\nExclusive Photo Album",
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Platinum',
                'price' => 'BDT 85K',
                'suffix' => '/ event',
                'is_popular' => 1,
                'features' => "2 Chief Photographers\n2 Senior Cinematographers\n6 Hours Coverage\n200 Edited Photos\n5-Min Cinematic Trailer\nPremium Photobook",
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Diamond',
                'price' => 'BDT 120K',
                'suffix' => '/ event',
                'is_popular' => 0,
                'features' => "Top Tier Photography Team\nDrone Cinematography\nFull Day Coverage\nAll High-Res Photos\nFull Documentary Film\nLuxury Photobook + Prints",
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
