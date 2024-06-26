<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mentor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function courses(): BelongsToMany
    {
        return $this-> BelongsToMany(Course::class);
    }
    
}
