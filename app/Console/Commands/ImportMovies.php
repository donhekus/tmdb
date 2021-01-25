<?php

namespace App\Console\Commands;

use App\Services\ImporterService;
use Illuminate\Console\Command;

/**
 * Class ImportMovies
 * @package App\Console\Commands
 */
class ImportMovies extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'import:movies';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';
	/**
	 * @var ImporterService
	 */
	private $importerService;

	/**
	 * Create a new command instance.
	 *
	 * @param ImporterService $importerService
	 */
	public function __construct(ImporterService $importerService)
	{
		parent::__construct();
		$this->importerService = $importerService;
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$this->importerService->importMovies();

		$this->line("Import finished");
		return 0;
	}
}
