<?php

namespace App\Services;

use App\Repositories\Interfaces\MovieRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Tmdb\Importer\Facades\Importer;

/**
 * Class ImporterService
 * @package App\Services
 */
class ImporterService
{
	/**
	 * @var MovieRepository
	 */
	private $movieRepository;

	/**
	 * ImporterService constructor.
	 *
	 * @param MovieRepository $movieRepository
	 */
	public function __construct(MovieRepository $movieRepository)
	{
		$this->movieRepository = $movieRepository;
	}

	public function importMovies(): bool
	{
		$this->movieRepository->deleteAll();
		$movies = Importer::getList(210);

		foreach ($movies as $movie) {
			$movieUrl = Http::withoutRedirecting()->get('https://www.themoviedb.org/movie/' . $movie['id'])->header(
				'Location'
			);
			$movieDetails = Importer::getMovie($movie['id']);
			$crew = Importer::getCredits($movie['id']);
			$directors = [];
			foreach ($crew['crew'] as $member) {
				if ($member['job'] == 'Director') {
					$director = Importer::getCrewMember($member['id']);
					$directors[] = [
						'id'            => $director['id'],
						'name'          => $director['name'],
						'bio'           => $director['biography'],
						'date_of_birth' => $director['birthday'] ? Carbon::createFromFormat('Y-m-d', $director['birthday']) : null,
					];
				}
			}

			$movieData = [
				'id'                => $movie['id'],
				'title'             => $movieDetails['title'],
				'length'            => $movieDetails['runtime'],
				'release_date'      => Carbon::createFromFormat('Y-m-d', $movie['release_date']),
				'overview'          => $movieDetails['overview'],
				'poster_url'        => $movieDetails['poster_path'],
				'tmdb_vote_average' => $movieDetails['vote_average'],
				'tmdb_vote_count'   => $movieDetails['vote_count'],
				'tmdb_url'          => $movieUrl,
				'genres'            => $movieDetails['genres'],
				'directors'         => $directors
			];

			$this->movieRepository->store($movieData);
		}

		return true;
	}
}
