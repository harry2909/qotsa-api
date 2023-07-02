<?php

namespace App\Providers;

use App\Interfaces\AlbumInterface;
use App\Interfaces\LyricsInterface;
use App\Interfaces\SongInterface;
use App\Repositories\AlbumRepository;
use App\Repositories\LyricsRepository;
use App\Repositories\SongRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LyricsInterface::class, LyricsRepository::class);
        $this->app->bind(AlbumInterface::class, AlbumRepository::class);
        $this->app->bind(SongInterface::class, SongRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
