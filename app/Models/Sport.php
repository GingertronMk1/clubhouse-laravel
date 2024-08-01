<?php

namespace App\Models;

use Database\Factories\SportFactory;
use Illuminate\Database\Eloquent\Concerns\HasVersion7Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sport extends Model
{
    /** @use HasFactory<SportFactory> */
    use HasFactory;

    use HasVersion7Uuids;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'colour',
    ];

    protected $casts = [];
}
