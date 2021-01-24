<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

/**
 * Class Director
 * @package App\Models
 *
 * @property int                $id
 * @property string             $name
 * @property string             $tmdb_id
 * @property string             $bio
 * @property Carbon             $date_of_birth
 *
 * @property Collection|Movie[] $movies
 */
class Director extends Model
{
	/**
	 * @inheritdoc
	 */
	protected $casts = [
		'date_of_birth' => 'date',
	];

	/**
	 * @inheritdoc
	 */
	protected $fillable = [
		'name',
		'tmdb_id',
		'bio',
		'date_of_birth',
	];

	/**
	 * @return BelongsToMany
	 */
	public function movies(): BelongsToMany
	{
		return $this->belongsToMany(Movie::class);
	}
}
