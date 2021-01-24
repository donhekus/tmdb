<?php

namespace Tmdb\Importer\Facades;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * Class Importer
 *
 * @method Collection getList(int $limit)
 * @method Collection getMovie(string $movieId)
 * @method Collection getCredits(string $movieId)
 * @method Collection getDirector(string $directorId)
 */
class Importer extends Facade
{
	/**
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'importer';
	}
}
