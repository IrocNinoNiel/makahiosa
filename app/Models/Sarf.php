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


    public function org(){
        return $this->belongsTo(User::class,'organization_id');
    }

    public function files() {
        return $this->hasMany(FileUserInput::class,'sarves_id');
    }
}
