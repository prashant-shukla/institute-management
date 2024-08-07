<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerCategory extends Model
{
    use HasFactory;

    /**
     * @var string
     */
     protected $guarded = ['id'];
    // protected $table = 'banner_categories';

    protected $fillable = ['name', 'slug', 'description', 'is_active'];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function banners()
    {
        return $this->hasMany(Banner::class, 'banner_category_id');
    }
}
