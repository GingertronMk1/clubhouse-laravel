<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\PersonFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasVersion7Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $bio
 * @property Carbon $dob
 * @property User $user
 * @property int $user_id
 */
class Person extends Model
{
    /** @use HasFactory<PersonFactory> */
    use HasFactory;

    use HasVersion7Uuids;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'bio',
        'dob',
        'user_id',
    ];

    protected $casts = [
        'name' => 'string',
        'bio' => 'string',
        'dob' => 'immutable_date',
    ];

    protected $appends = [
        'age',
    ];

    protected $with = [
        'user',
    ];

    /**
     * @return Attribute<int, void>
     */
    protected function age(): Attribute
    {
        return Attribute::make(
            get: function () {
                $dateValue = Carbon::parse($this->dob);
                $diff = $dateValue->diff(Carbon::now());

                return floor($diff->totalYears);
            },
        );
    }

    /**
     * @return BelongsTo<User, Person>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsToMany<Team>
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }
}
