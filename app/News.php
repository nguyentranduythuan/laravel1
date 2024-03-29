<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
// use Laravel\Scout\Searchable;

class News extends Model
{
    protected $table = "news";
    protected $fillable = ['title','slug','author','intro','content','status','image','category_id'];

    public function categories()
    {
        return $this->belongsToMany('App\Category','articles');
    }

    public function News()
    {

    }

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // public function searchableAs()
    // {
    //     return "title";
    // }
}
