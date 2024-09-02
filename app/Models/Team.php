<?php

namespace App\Models;

use App\Casts\ColourArray;
use Database\Factories\TeamFactory;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Concerns\HasVersion7Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/** @mixin Builder */
class Team extends Model
{
    /** @use HasFactory<TeamFactory> */
    use HasFactory;
    use HasVersion7Uuids;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'colours',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'colours' => ColourArray::class,
        ];
    }
}
