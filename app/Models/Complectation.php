<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Complectation
 * @package App\Models
 */
class Complectation extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'item_id',
        'complectation',
        'parameters',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'parameters' => 'json',
    ];
    
    /**
     * @return BelongsTo
     */
    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }
}
