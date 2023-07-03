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
        $jsonData = file_get_contents(base_path('./qotsaData/data.json'));
        $decodedData = json_decode($jsonData, true);
        foreach ($decodedData as $albumData) {
            Album::firstOrCreate(
                ['name' => $albumData['name']],
                [
                    'release_date' => $albumData['release_date'],
                    'run_time' => $albumData['run_time'],
                    'spotify_url' => $albumData['spotify_url']
                ]
            );
            foreach ($albumData['songs'] as $songData) {
                Song::firstOrCreate(
                    ['name' => $songData['name'], 'album_id' => $songData['album_id']],
                    [
                        'run_time' => $songData['run_time'],
                        'spotify_url' => $songData['spotify_url']
                    ]
                );
                foreach ($songData['lyrics'] as $lyricData) {
                    $createdLyric = new Lyrics();
                    $createdLyric->lyrics = $lyricData;
                    $createdLyric->song_id = $songData['id'];
                    $createdLyric->save();
                }
            }
        }
    }
}
