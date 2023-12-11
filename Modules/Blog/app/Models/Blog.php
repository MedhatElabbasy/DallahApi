<?php

namespace Modules\Blog\app\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia
{
    use HasSlug, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'content',
        'slug',
        'is_published',
    ];


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
