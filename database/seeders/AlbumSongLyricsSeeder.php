<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Song;
use App\Models\Lyrics;
use Illuminate\Database\Seeder;

class AlbumSongLyricsSeeder extends Seeder
{
    public function run()
    {

        $albumsData = [
            '0' => [
                'album' => 'Queens of the Stone Age',
            ]
        ];

        foreach ($albumsData as $albumData) {
            $createdAlbum = Album::factory()
                ->create([
                    'name' => $albumData['album'],
                ]);

            $songNames = [
                'Regular John',
                'Avon',
                'If Only',
                'Walkin on the Sidewalks',
                'You Would Know',
                'The Bronze',
                'How to Handle a Rope',
                'Mexicola',
                'Hispanic Impressions',
                'You Cant Quit Me Baby',
                'These Arent the Droids Youre Looking For',
                'Give the Mule What He Wants',
                'Spiders and Vinegaroons',
                'I Was a Teenage Hand Model'
            ];
            foreach ($songNames as $songName) {
                $song = Song::factory()
                    ->create([
                        'name' => $songName,
                        'album_id' => $createdAlbum->id
                    ]);

                $lyricsLines = [
                    'Who are you girl?',
                    'Who are you boy?',
                    'Bet I know what you\'re up to',
                    'Can I come along?',
                    'Your home number on the wall',
                    'I just had to call, had to',
                    'I\'m not the only one',
                    'Who will run with a knife'
                ];
                foreach ($lyricsLines as $line) {
                    Lyrics::factory()
                        ->create([
                            'lyrics' => $line,
                            'song_id' => $song->id
                        ]);
                }
            }
        }
    }
}

