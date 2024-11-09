<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    // Optional: Specify the table name if it doesn't follow Laravel's naming conventions
    protected $table = 'history';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'date',
        'title',
        'description',
    ];
}
