<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
     protected $fillable = [
        'videoId','channelId','channelTitle', 'title','description','categories','published','thumbnail','views'
    ];
     public function setCategoriesAttribute($value)
    {
        $this->attributes['categories'] = json_encode($value);
    }
  
    /**
     * Get the categories
     *
     */
    public function getCategoriesAttribute($value)
    {
        return $this->attributes['categories'] = json_decode($value);
    }
}
