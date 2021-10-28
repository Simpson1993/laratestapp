<?php

namespace App\Console\Commands;

use App\Http\Resources\Collections\ItemCollection;
use App\Models\Item;
use App\Repositories\Contracts\SearchRepository;
use Illuminate\Console\Command;

class SearchItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'items:search';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search items';

    /**
     * @var SearchRepository
     */
    private $searchRepository;

    /**
     * Create a new command instance.
     *
     * @param  SearchRepository  $searchRepository
     */
    public function __construct(SearchRepository $searchRepository)
    {
        parent::__construct();
        $this->searchRepository = $searchRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $query = $this->ask('Enter search query');
        $result = $this->searchRepository->search(new Item(), $query)->take(10);

        $this->info((new ItemCollection($result))->toJson());

        return self::SUCCESS;
    }
}
