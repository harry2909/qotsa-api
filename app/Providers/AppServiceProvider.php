<?php

namespace App\Providers;

use App\Interfaces\AlbumInterface;
use App\Interfaces\LyricsInterface;
use App\Interfaces\SongInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\AlbumRepository;
use App\Repositories\LyricsRepository;
use App\Repositories\SongRepository;
use App\Repositories\UserRepository;
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
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
