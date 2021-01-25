<?php

use App\Models\Movie;

class ExampleTest extends TestCase
{
	private $movieRepository;
	private $importerService;

	public function setUp(): void
	{
		parent::setUp();

		$this->movieRepository = Mockery::mock(\App\Repositories\Interfaces\MovieRepository::class);
		$this->app->instance(\App\Repositories\Interfaces\MovieRepository::class, $this->movieRepository);
		$this->importerService = new \App\Services\ImporterService($this->movieRepository);
	}

	public function tearDown(): void
	{
		parent::tearDown();
		Mockery::close();
	}

	/**
	 * @return void
	 */
	public function testFind()
	{
		$this->movieRepository->shouldReceive('find')->andReturn(
			new Movie(
				[
					'id' => 111,
				]
			)
		);

		$this->movieRepository->shouldReceive('store')->andReturn(
			new Movie(
				[
					'id' => 111,
				]
			)
		);

		$this->movieRepository->shouldReceive('get')->once()->andReturn(
			new \Illuminate\Support\Collection()
		);

		$this->movieRepository->shouldReceive('update')->andReturn(true);

		$response = $this->importerService->importMovies();

		$this->assertTrue($response);
	}
}
