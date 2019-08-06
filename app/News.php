<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Scout\Searchable;

class News extends Model
{
    protected $table = "news";
    protected $fillable = ['title','slug','author','intro','content','status','image','category_id'];

    public function Category()
    {
        return $this->belongsTo('App\Category');
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

    // public function toSearchableArray()
    // {
    //     $array = $this->toArray();

    //     // Customize array...

    //     return $array;
    // }
}
