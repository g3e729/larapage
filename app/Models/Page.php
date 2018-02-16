<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model
{
    use HasSlug;
    
    protected $fillable = ['title', 'description', 'parent_id', 'page_file'];

    protected $dates = ['created_at', 'deleted_at', 'updated_at'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the options for generating the slug.
     */
    public static function getPage($page)
    {
        if($return = self::where('slug', $page)->first()) {
            return $return;
        }

        abort(404);
    }

    /**
     * Get all of the post's likes.
     */
    public function parent()
    {
        return $this->hasOne(self::class, 'id', 'parent_id');
    }

    /**
     * Get all of the post's likes.
     */
    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }

    /**
     * Get all of the post's likes.
     */
    public function keywords()
    {
        return $this->morphMany(File::class, 'tagable');
    }
}
