<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Services\ImporterService;
use App\Transformers\MovieTransformer;
use Illuminate\Http\JsonResponse;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
	/**
	 * @var ImporterService
	 */
	private $importerService;
	/**
	 * @var MovieTransformer
	 */
	private $movieTransformer;

	/**
	 * HomeController constructor.
	 *
	 * @param ImporterService  $importerService
	 * @param MovieTransformer $movieTransformer
	 */
	public function __construct(ImporterService $importerService, MovieTransformer $movieTransformer)
	{
		$this->importerService = $importerService;
		$this->movieTransformer = $movieTransformer;
	}

	/**
	 *
	 */
	public function index(): bool
	{
		return $this->importerService->importMovies();
	}

	/**
	 *
	 */
	public function show(): JsonResponse
	{
		$movies = Movie::all()->map(
			function (Movie $movie) {
				return $this->movieTransformer->transform($movie);
			}
		);
		return response()->json($movies);
	}
}
