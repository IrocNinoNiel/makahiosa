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
        'typeOfTheEvent',
        'generalObjective',
        'dateOfEvent',
        'endDateOfTheEvent',
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

    public function specific() {
        return $this->hasMany(SpecificObjective::class,'sarf_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class,'sarf_id');
    }
}
