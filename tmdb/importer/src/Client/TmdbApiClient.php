<?php

namespace Tmdb\Importer\Client;

use Illuminate\Support\Facades\Http;

/**
 * Class TmdbApiClient
 * @package Tmdb\Importer\Client
 */
class TmdbApiClient
{
	/**
	 * @param int $limit
	 *
	 * @return array
	 */
	public function getList(int $limit): array
	{
		$result = [];
		$page = 1;
		while (count($result) < $limit) {
			$result = array_merge(
				$result,
				Http::get(
					config('tmdb_importer.api_url') . 'movie/top_rated',
					[
						'api_key' => config('tmdb_importer.api_key'),
						'page'    => $page,
					]
				)->json()['results']
			);
			$page++;
		}
		return array_slice($result, 0, $limit);
	}

	/**
	 * @param int $movieId
	 *
	 * @return array
	 */
	public function getMovie(int $movieId): array
	{
		return Http::get(
			config('tmdb_importer.api_url') . 'movie/' . $movieId,
			[
				'api_key' => config('tmdb_importer.api_key'),
			]
		)->json();
	}

	/**
	 * @param int $movieId
	 *
	 * @return array
	 */
	public function getCredits(int $movieId): array
	{
		return Http::get(
			config('tmdb_importer.api_url') . 'movie/' . $movieId . '/credits',
			[
				'api_key' => config('tmdb_importer.api_key'),
			]
		)->json();
	}

	/**
	 * @param int $memberId
	 *
	 * @return array
	 */
	public function getCrewMember(int $memberId): array
	{
		return Http::get(
			config('tmdb_importer.api_url') . 'person/' . $memberId,
			[
				'api_key' => config('tmdb_importer.api_key'),
			]
		)->json();
	}
}
