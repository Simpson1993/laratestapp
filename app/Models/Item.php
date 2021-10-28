<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Item
 * @package App\Models
 */
class Item extends Model
{
    use HasFactory;

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
}
