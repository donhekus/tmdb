<?php

namespace App\Repositories\Interfaces;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface MoviesRepository
 * @package App\Repositories\Interfaces
 */
interface MovieRepository
{
	/**
	 * @param array $data
	 *
	 * @return Movie|Model
	 */
	public function store(array $data): Model;

	/**
	 * @return bool
	 */
	public function deleteAll(): bool;
}
