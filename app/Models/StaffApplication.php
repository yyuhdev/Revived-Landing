<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class StaffApplication extends Model
{
    protected $fillable = [
        'ign',
        'discord_tag',
        'age',
        'reason',
        'experience',
        'activity'
    ];
}
