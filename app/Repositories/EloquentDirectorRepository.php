<?php

namespace App\Repositories;

use App\Models\Director;
use App\Repositories\Interfaces\DirectorRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EloquentDirectorRepository
 * @package App\Repositories
 */
class EloquentDirectorRepository implements DirectorRepository
{
	/**
	 * @var Director
	 */
	private $directorModel;

	/**
	 * EloquentDirectorRepository constructor.
	 *
	 * @param Director $directorModel
	 */
	public function __construct(Director $directorModel)
	{
		$this->directorModel = $directorModel;
	}

	/**
	 * @inheritDoc
	 */
	public function firstOrStore(array $data): Model
	{
		return $this->directorModel->newQuery()->firstOrCreate(['id' => $data['id']], $data);
	}
}
