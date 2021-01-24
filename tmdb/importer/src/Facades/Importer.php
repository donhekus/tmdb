<?php

namespace Tmdb\Importer\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Importer
 *
 * @method static array getList(int $limit)
 * @method static array getMovie(string $movieId)
 * @method static array getCredits(string $movieId)
 * @method static array getCrewMember(string $directorId)
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
