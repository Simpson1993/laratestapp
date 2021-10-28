<?php

namespace App\Models;

use App\Models\Contracts\Indexable;
use App\Models\Traits\Indexation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Item
 * @package App\Models
 */
class Item extends Model implements Indexable
{
    use HasFactory;
    use Indexation;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'year',
        'colour',
    ];
    
    /**
     * @return HasMany
     */
    public function complectations()
    {
        return $this->hasMany('App\Models\Complectation');
    }

    /**
     * @return array
     */
    public function getIndexFields(): array
    {
        // Model data that will be required for later search
        return [
            'id'             => $this->id,
            'title'          => $this->title,
            'description'    => $this->description,
            'year'           => $this->year,
            'complectations' => implode(',', $this->complectations->pluck('complectation')->toArray())
        ];
    }

    /**
     * @return string
     */
    public function getElasticIndex(): string
    {
        return 'items';
    }

    /**
     * @return string
     */
    public function getElasticType(): string
    {
        return 'item';
    }
}
