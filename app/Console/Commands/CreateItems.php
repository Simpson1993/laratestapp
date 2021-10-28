<?php

namespace App\Console\Commands;

use App\Enum\ColourEnum;
use App\Enum\ComplectationEnum;
use App\Http\Resources\Collections\ItemCollection;
use App\Http\Resources\ItemResource;
use App\Models\Complectation;
use App\Models\Item;
use App\Repositories\Contracts\SearchRepository;
use \Faker\Generator as Faker;
use Illuminate\Console\Command;

class CreateItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'items:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create items';

    /**
     * @var Faker
     */
    private $faker;

    /**
     * @param  Faker  $faker
     */
    public function __construct(Faker $faker)
    {
        parent::__construct();
        $this->faker = $faker;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $title = $this->ask('Enter item title');
        $description = $this->ask('Enter item description');
        $colour = $this->choice(
            'Select colour',
            ColourEnum::getValues(),
            ColourEnum::white()->getValue()
        );
        $colour = ColourEnum::make($colour)->getIndex();
        $year = $this->ask('Enter item year', 2021);
        $complectation = $this->choice(
            'Select complectation',
            ComplectationEnum::getValues(),
            ComplectationEnum::base()->getValue()
        );
        $complectation = ComplectationEnum::make($complectation)->getIndex();
        $parametersList = $this->faker->words(10);
        $parameters = $this->choice(
            'Select complectation',
            $parametersList,
            null,
            5,
            true
        );

        $item = Item::factory()->createOne(compact('title', 'description','colour','year'));
        Complectation::factory()->for($item)->create([
            'complectation' => $complectation,
            'parameters'    => $parameters,
        ]);

        $this->info((new ItemResource($item->load('complectations')))->toJson());

        return self::SUCCESS;
    }
}
