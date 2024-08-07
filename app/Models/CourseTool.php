<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class CourseTool extends Model
{
    use HasFactory;
    protected $fillable = ['id','tool_id','sort'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }
    
}
