<?php

namespace Tmdb\Importer;

use Illuminate\Support\ServiceProvider;
use Tmdb\Importer\Client\TmdbApiClient;

/**
 * Class TmdbImporterServiceProvider
 */
class TmdbImporterServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application events.
	 */
	public function boot()
	{
		$this->mergeConfigFrom(__DIR__ . '/../config/tmdb_importer.php', 'tmdb_importer');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('importer', function ($app) {
			return new TmdbApiClient();
		});
	}
}
