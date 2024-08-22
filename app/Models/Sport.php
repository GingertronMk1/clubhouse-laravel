<?php

namespace App\Models;

use Database\Factories\SportFactory;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Concerns\HasVersion7Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/** @mixin Builder */
class Sport extends Model
{
    /** @use HasFactory<SportFactory> */
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
     * The relations to eager load on every query.
     *
     * @var array<int, string>
     */
    protected $with = [];

    /**
     * @return HasMany<Competition>
     */
    public function competitions(): HasMany
    {
        return $this->hasMany(Competition::class);
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
