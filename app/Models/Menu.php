<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Traits\HasRoles;
class Menu extends Model
{
    use HasRoles;
    use HasFactory;
    protected $fillable = ['title', 'key', 'location', 'activated']; 
    public function locations()
{
    return $this->hasMany(MenuLocation::class, 'menu_id');
}
}
