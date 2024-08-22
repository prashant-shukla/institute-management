<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Banner extends Model 
{

    use HasFactory;

     /**
     * @var array<int, string>
     */
    protected $fillable = [
        'banner_page',
        'sort',
        'title',
        'description',
        'image_url',
        'click_url',
        'click_url_target',
        'is_visible',
        'start_date',
        'end_date',
    ];
    protected $casts = [
        'is_visible' => 'boolean',
        'image_url' => 'array', // Casts the image_url field as an array
    ];

    /**
     * @var array<string, string>
     */
    

    public function category(): BelongsTo
    {
        return $this->belongsTo(BannerCategory::class, 'banner_category_id');
    }

    public function registerMediaConversions(Media|null $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('banners')
            ->singleFile();
    }

}
