<?php

namespace App\Transformers;

use App\Models\Movie;
use App\ViewModel\MovieViewModel;

/**
 * Class MovieTransformer
 * @package App\Transformers
 */
class MovieTransformer
{
	/**
	 * @param Movie $movie
	 *
	 * @return MovieViewModel
	 */
	public function transform(Movie $movie): MovieViewModel
	{
		return new MovieViewModel(
			$movie->id,
			$movie->title,
			$movie->genres,
			$movie->release_date,
			$movie->overview,
			$movie->poster_url,
			$movie->tmdb_vote_average,
			$movie->tmdb_vote_count,
			$movie->tmdb_url,
			$movie->directors
		);
	}
}
