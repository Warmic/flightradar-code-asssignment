<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPassport
 */
class Passport extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];
}
