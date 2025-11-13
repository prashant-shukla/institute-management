<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Traits\HasRoles;

use Spatie\Tags\HasTags;

class Post extends Model
{
    use HasFactory;
    use HasRoles;

    /**
     * @var string
     */
    protected $table = 'blog_posts';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'blog_author_id',
        'blog_category_id',
        'title',
        'slug',
        'content',
        'content_overview',
        'published_at',
        'seo_title',
        'seo_description',
        'is_featured',
        'image',
        'tags',
        'short_description',
        'link',
        'tags',
        'video_url',
        'site_title',
        'meta_keywords',
        'meta_description',
    ];


    /**
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'date',
        'is_featured' => 'boolean',
        'tags' => 'array',
    ];

    /** @return BelongsTo<User,self> */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'blog_author_id');
    }

    /** @return BelongsTo<Category,self> */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'blog_category_id');
    }
}
