<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Repositories\Interfaces\DirectorRepository;
use App\Repositories\Interfaces\GenreRepository;
use App\Repositories\Interfaces\MovieRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EloquentMovieRepository
 * @package App\Repositories
 */
class EloquentMovieRepository implements MovieRepository
{
	/**
	 * @var Movie
	 */
	private $movieModel;
	/**
	 * @var GenreRepository
	 */
	private $genreRepository;
	/**
	 * @var DirectorRepository
	 */
	private $directorRepository;

	/**
	 * EloquentMovieRepository constructor.
	 *
	 * @param Movie              $movieModel
	 * @param GenreRepository    $genreRepository
	 * @param DirectorRepository $directorRepository
	 */
	public function __construct(
		Movie $movieModel,
		GenreRepository $genreRepository,
		DirectorRepository $directorRepository
	) {
		$this->movieModel = $movieModel;
		$this->genreRepository = $genreRepository;
		$this->directorRepository = $directorRepository;
	}

	/**
	 * @inheritDoc
	 */
	public function store(array $data): Model
	{
		/** @var Movie $movie */
		$movie = $this->movieModel->newQuery()->create($data);

		foreach ($data['genres'] as $genre) {
			$genreModel = $this->genreRepository->firstOrStore($genre);
			$movie->genres()->attach($genreModel->id);
		}

		foreach ($data['directors'] as $director) {
			$directorModel = $this->directorRepository->firstOrStore($director);
			$movie->directors()->attach($directorModel->id);
		}

		return $movie;
	}

	/**
	 * @inheritDoc
	 */
	public function deleteAll(): bool
	{
		return $this->movieModel->newQuery()->delete();
	}
}
