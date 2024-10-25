<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'organizer',
        'start_date',
        'end_date',
        'paid',
        'photo',
        'address',
        'location',
        'description',
        'site_title',
        'meta_keyword',
        'meta_description',
    ];
    // In your Event model
public function getFormattedStartDateAttribute()
{
    return \Carbon\Carbon::parse($this->start_date)->format('Y-m-d');
}

public function getFormattedEndDateAttribute()
{
    return \Carbon\Carbon::parse($this->end_date)->format('Y-m-d');
}

}
