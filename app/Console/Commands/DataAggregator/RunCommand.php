<?php

declare(strict_types=1);

namespace App\Console\Commands\DataAggregator;

use App\DataAggregators\DataAggregatorManager;
use Illuminate\Console\Command;

class RunCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'data-aggregator:run';

    /**
     * The console command description.
     */
    protected $description = 'Import the Genshin Impact Wiki';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(private DataAggregatorManager $dataAggregatorManager)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->dataAggregatorManager->aggregateData();

        return static::SUCCESS;
    }
}
