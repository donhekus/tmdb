<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

/**
 * Class Movie
 * @package App\Models
 *
 * @property int                   $id
 * @property string                $title
 * @property int                   $length
 * @property Carbon                $release_date
 * @property string                $overview
 * @property string                $poster_url
 * @property string                $imdb_id
 * @property float                 $tmdb_vote_average
 * @property int                   $tmdb_vote_count
 * @property string                $tmdb_url
 *
 * @property Collection|Genre[]    $genres
 * @property Collection|Director[] $directors
 */
class Movie extends Model
{
	/**
	 * @inheritdoc
	 */
	public $casts = [
		'release_date' => 'date',
	];

	/**
	 * @inheritdoc
	 */
	protected $fillable = [
		'id',
		'title',
		'length',
		'release_date',
		'overview',
		'poster_url',
		'tmdb_id',
		'tmdb_vote_average',
		'tmdb_vote_count',
		'tmdb_url',
	];

	/**
	 * @inheritdoc
	 */
	public $timestamps = false;

	/**
	 * @return BelongsToMany
	 */
	public function genres(): BelongsToMany
	{
		return $this->belongsToMany(Genre::class);
	}

	/**
	 * @return BelongsToMany
	 */
	public function directors(): BelongsToMany
	{
		return $this->belongsToMany(Director::class);
	}
}
