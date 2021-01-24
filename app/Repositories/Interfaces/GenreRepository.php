<?php

namespace App\Repositories\Interfaces;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface GenreRepository
 * @package App\Repositories\Interfaces
 */
interface GenreRepository
{
	/**
	 * @param array $data
	 *
	 * @return Genre|Model
	 */
	public function firstOrStore(array $data): Model;
}
