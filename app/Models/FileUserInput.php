<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUserInput extends Model
{
    use HasFactory;

    protected $fillable = [
        'sarves_id',
        'name',
        'location',
        'status',
        'truename',
        'extension'
    ];
}
