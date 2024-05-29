<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Center(): HasMany
    {
        return $this->hasMany(Center::class);
    }
}
