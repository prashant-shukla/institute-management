<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'key', 'location', 'activated']; 
    public function locations()
{
    return $this->hasMany(MenuLocation::class, 'menu_id');
}
}
