<?php

namespace App\Models;

use Database\Factories\TeamFactory;
use Illuminate\Database\Eloquent\Concerns\HasVersion7Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    /** @use HasFactory<TeamFactory> */
    use HasFactory;

    use HasVersion7Uuids;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'address',
        'sport_id'
    ];

    protected $casts = [];

    protected $with = [
        'people',
        'sport'
    ];

    /**
     * @return BelongsToMany<Person>
     */
    public function people(): BelongsToMany
    {
        return $this->belongsToMany(Person::class);
    }

    /**
     * @return BelongsTo<Sport>
     */
    public function sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class);
    }
}
