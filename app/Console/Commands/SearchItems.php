<?php

namespace App\Console\Commands;

use App\Http\Resources\Collections\ItemCollection;
use App\Http\Resources\ItemResource;
use App\Models\Item;
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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $query = $this->ask('Enter search query');
        $result = Item::whereLike('title', $query)->limit(10)->get();

        $this->info((new ItemCollection($result))->toJson());

        return self::SUCCESS;
    }
}
