<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateServices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        \DB::table('galleries')->truncate();
        \DB::table('testmonies')->truncate();

        $images = ['service1.png', 'service2.png', 'service3.png', 'service4.png', 'service5.png', 'service6.png'];

        // Seed Galleries
        for ($i=0; $i<6; $i++) {
            \DB::table('galleries')->insert([
                'image' => $images[$i % 6],
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Seed Testmonies
        $reviews = [
            "We were blown away by the amazing photos. Every moment was captured beautifully and perfectly reflected the joy of our big day.",
            "Absolutely stunning work! The team was so professional, and the cinematic video they produced brought tears to our eyes.",
            "Choosing this team was the best decision we made for our wedding. The attention to detail and artistic touch are unmatched."
        ];
        $reviewers = ["Sarah & John", "Emily & David", "Jessica & Michael"];

        for ($i=0; $i<3; $i++) {
            \DB::table('testmonies')->insert([
                'reviewer' => $reviewers[$i],
                'review' => $reviews[$i],
                'photo' => $images[$i % 6],
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $this->info('Data seeded successfully.');
        return 0;
    }
}
