<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/browse', function () {
    return view('browse', [
        'concerts' => [
            [
                'id' => 1,
                'imageURL' => 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'title' => 'Head In The Clouds',
                'artists' => 'NewJeans, Twice',
                'date' => 'Monday, December 13, 2021',
                'city' => 'London'
            ],
            [
                'id' => 2,
                'imageURL' => 'https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'title' => 'The Red Chord',
                'artists' => 'Animals As Leaders and The Contortionist',
                'date' => 'Monday, December 13, 2021',
                'city' => 'London',
            ],
            [
                'id' => 3,
                'imageURL' => 'https://images.unsplash.com/photo-1459749411175-04bf5292ceea?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'title' => 'The Red Chord',
                'artists' => 'Animals As Leaders and The Contortionist',
                'date' => 'Monday, December 13, 2021',
                'city' => 'London',
            ]
        ]
    ]);
});

Route::get('/concerts/{id}', function ($id) {
    return view('concert', [
        'concert' => [
            'id' => 1,
            'title' => 'Head In The Clouds',
            'artists' => 'NewJeans, Twice',
            'date' => 'Monday, December 13, 2021',
            'city' => 'London',
            'venue' => 'The O2',
            'venue_address' => 'Peninsula Square, North Greenwich, London SE10 0DX',
            'ticket_price' => 3250,
            'ticket_price_in_dollars' => 45.00,
            'videoURL' => 'https://www.youtube.com/watch?v=uGPhtnaS4Og',
            'imageURL' => 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'additional_information' => 'This is a really cool concert. You should go to it.',
            'description' => "It's a transcendent musical experience that promises to transport audiences to new heights of euphoria and sonic bliss. Set to take place on January 12th, 2024, at the iconic venue Twice in Jakarta, Indonesia, this event is brought to you by NewJeans"
        ]
    ]);
});
