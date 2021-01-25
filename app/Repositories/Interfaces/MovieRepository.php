<?php

namespace App\Repositories\Interfaces;

use App\Models\Movie;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Interface MoviesRepository
 * @package App\Repositories\Interfaces
 */
interface MovieRepository
{
	/**
	 * @return Collection
	 */
	public function get(): Collection;

	/**
	 * @param int $id
	 *
	 * @return Movie|Model|null
	 */
	public function find(int $id): ?Model;

	/**
	 * @param array $data
	 *
	 * @return Movie|Model
	 */
	public function store(array $data): Model;

	/**
	 * @param Movie $movie
	 * @param array $data
	 *
	 * @return bool
	 */
	public function update(Movie $movie, array $data): bool;

	/**
	 * @param Movie $movie
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function delete(Movie $movie): bool;

	/**
	 * @return bool
	 */
	public function deleteAll(): bool;
}
