<?php

namespace App\Repositories\Interfaces;

use App\Models\Director;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface DirectorRepository
 * @package App\Repositories\Interfaces
 */
interface DirectorRepository
{
	/**
	 * @param array $data
	 *
	 * @return Director|Model
	 */
	public function firstOrStore(array $data): Model;
}
