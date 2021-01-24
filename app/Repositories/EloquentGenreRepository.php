<?php

namespace App\Repositories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EloquentGenreRepository
 * @package App\Repositories
 */
class EloquentGenreRepository implements Interfaces\GenreRepository
{
	/**
	 * @var Genre
	 */
	private $genreModel;

	/**
	 * EloquentGenreRepository constructor.
	 *
	 * @param Genre $genreModel
	 */
	public function __construct(Genre $genreModel)
	{
		$this->genreModel = $genreModel;
	}

	/**
	 * @inheritDoc
	 */
	public function firstOrStore(array $data): Model
	{
		return $this->genreModel->newQuery()->firstOrCreate(['id' => $data['id']], $data);
	}
}
