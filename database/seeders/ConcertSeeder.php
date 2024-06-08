<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('concerts')->insert([
            [
                'title' => 'Head In The Clouds',
                'artists' => 'NewJeans, Twice',
                'date' => '2021-12-13',
                'city' => 'London',
                'venue' => 'The O2',
                'venue_address' => 'Peninsula Square, North Greenwich, London SE10 0DX',
                'ticket_price_in_rupiah' => 3250000,
                'videoURL' => 'https://www.youtube.com/watch?v=uGPhtnaS4Og',
                'imageURL' => 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'additional_information' => 'This is a really cool concert. You should go to it.',
                'description' => "It's a transcendent musical experience that promises to transport audiences to new heights of euphoria and sonic bliss. Set to take place on January 12th, 2024, at the iconic venue Twice in Jakarta, Indonesia, this event is brought to you by NewJeans",
            ],
            [
                'title' => 'The Red Chord',
                'artists' => 'Animals As Leaders and The Contortionist',
                'date' => '2021-12-13',
                'city' => 'London',
                'venue' => 'The O2',
                'venue_address' => 'Peninsula Square, North Greenwich, London SE10 0DX',
                'ticket_price_in_rupiah' => 3000000,
                'videoURL' => 'https://www.youtube.com/watch?v=uGPhtnaS4Og',
                'imageURL' => 'https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'additional_information' => 'This is another great concert.',
                'description' => "Experience a night of intense and complex metal music. December 13th, 2021 at The O2 in London.",
            ],
            [
                'title' => 'The Red Chord',
                'artists' => 'Animals As Leaders and The Contortionist',
                'date' => '2021-12-13',
                'city' => 'London',
                'venue' => 'The O2',
                'venue_address' => 'Peninsula Square, North Greenwich, London SE10 0DX',
                'ticket_price_in_rupiah' => 3000000,
                'videoURL' => 'https://www.youtube.com/watch?v=uGPhtnaS4Og',
                'imageURL' => 'https://images.unsplash.com/photo-1459749411175-04bf5292ceea?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'additional_information' => 'Another amazing concert experience.',
                'description' => "Another intense and complex metal music concert. December 13th, 2021 at The O2 in London.",
            ],
        ]);
    }
}
