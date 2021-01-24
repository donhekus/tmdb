<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

/**
 * Class Genre
 * @package App\Models
 *
 * @property int                $id
 * @property string             $name
 *
 * @property Collection|Movie[] $movies
 */
class Genre extends Model
{
	/**
	 * @inheritdoc
	 */
	protected $fillable = [
		'name',
	];

	/**
	 * @return BelongsToMany
	 */
	public function movies(): BelongsToMany
	{
		return $this->belongsToMany(Movie::class);
	}
}
