<?php

namespace App\Models;

use Database\Factories\GameFactory;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Concerns\HasVersion7Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/** @mixin Builder */
class Game extends Model
{
    /** @use HasFactory<GameFactory> */
    use HasFactory;
    use HasVersion7Uuids;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    /**
     * @return BelongsTo<Team, self>
     */
    public function team1(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_1_id');
    }

    /**
     * @return BelongsTo<Team, self>
     */
    public function team2(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_2_id');
    }

    /**
     * @return BelongsTo<Competition, self>
     */
    public function competition(): BelongsTo
    {
        return $this->belongsTo(Competition::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [];
    }
}
