<?php

namespace App\Providers;

use App\Repositories\EloquentDirectorRepository;
use App\Repositories\EloquentGenreRepository;
use App\Repositories\EloquentMovieRepository;
use App\Repositories\Interfaces\DirectorRepository;
use App\Repositories\Interfaces\GenreRepository;
use App\Repositories\Interfaces\MovieRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		$this->app->bind(DirectorRepository::class, EloquentDirectorRepository::class);
        $this->app->bind(GenreRepository::class, EloquentGenreRepository::class);
        $this->app->bind(MovieRepository::class, EloquentMovieRepository::class);
    }
}
