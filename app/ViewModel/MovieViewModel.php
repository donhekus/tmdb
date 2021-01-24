<?php

namespace App\ViewModel;

use Illuminate\Support\Collection;

/**
 * Class MovieViewModel
 * @package App\ViewModel
 */
class MovieViewModel
{
	/**
	 * @var int
	 */
	public $id;
	/**
	 * @var string
	 */
	public $title;
	/**
	 * @var Collection
	 */
	public $genres;
	/**
	 * @var string
	 */
	public $release_date;
	/**
	 * @var string
	 */
	public $overview;
	/**
	 * @var string
	 */
	public $poster_url;
	/**
	 * @var float
	 */
	public $vote_average;
	/**
	 * @var int
	 */
	public $vote_count;
	/**
	 * @var string
	 */
	public $tmdb_url;
	/**
	 * @var Collection
	 */
	public $directors;

	/**
	 * MovieViewModel constructor.
	 *
	 * @param int        $id
	 * @param string     $title
	 * @param Collection $genres
	 * @param string     $release_date
	 * @param string     $overview
	 * @param string     $poster_url
	 * @param float      $vote_average
	 * @param int        $vote_count
	 * @param string     $tmdb_url
	 * @param Collection $directors
	 */
	public function __construct(
		int $id,
		string $title,
		Collection $genres,
		string $release_date,
		string $overview,
		string $poster_url,
		float $vote_average,
		int $vote_count,
		string $tmdb_url,
		Collection $directors
	)
	{
		$this->id = $id;
		$this->title = $title;
		$this->genres = $genres;
		$this->release_date = $release_date;
		$this->overview = $overview;
		$this->poster_url = $poster_url;
		$this->vote_average = $vote_average;
		$this->vote_count = $vote_count;
		$this->tmdb_url = $tmdb_url;
		$this->directors = $directors;
	}
}
