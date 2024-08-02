<?php

namespace App\Models;

use Database\Factories\PositionFactory;
use Illuminate\Database\Eloquent\Concerns\HasVersion7Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    /** @use HasFactory<PositionFactory> */
    use HasFactory;

    use HasVersion7Uuids;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'sport_id',
        'preview_position_x',
        'preview_position_y',
        'sort_order',
        'default_number',
    ];

    protected $casts = [];

    protected $with = [
        'sport',
    ];

    /**
     * @return BelongsTo<Sport, Position>
     */
    public function sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class);
    }
}
