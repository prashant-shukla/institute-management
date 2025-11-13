<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
class Setting extends Model
{
    use HasRoles;
    use HasFactory;
    protected $table = 'settings';  

    protected $fillable = [
        'key',
        'value',
    ];

    protected $casts = [
        'value' => 'array', 
    ];
}
