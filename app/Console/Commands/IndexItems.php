<?php

namespace App\Console\Commands;

use App\Models\Item;
use Elasticsearch\Client;
use Illuminate\Console\Command;

class IndexItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'items:index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elasticsearch items indexation';

    /**
     * @var Client
     */
    private $client;

    /**
     * Create a new command instance.
     *
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $items = Item::all();

        $bar = $this->output->createProgressBar(count($items));
        $bar->start();

        foreach ($items as $item) {
            // Send request to index $item
            $this->client->index($item->creatingIndexData());
            $bar->advance();
        }

        $bar->finish();
        $this->info('All indexes are successfully added!');

        return Command::SUCCESS;
    }
}
