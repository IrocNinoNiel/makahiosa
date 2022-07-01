<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarf extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateOfApplication',
        'organization_id',
        'nameOfRepresentative',
        'titleOfTheEvent',
        'generalObjective',
        'dateOfEvent',
        'hoursDuration',
        'startOfEvent',
        'endOfEvent',
        'numOfParticipant',
        'venueOfEvent',
        'amountAllocated',
        'sourceOfFunds',
    ];
}
