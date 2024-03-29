<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificObjective extends Model
{
    use HasFactory;

    protected $fillable = [
        'sarf_id',
        'name',
    ];
}
