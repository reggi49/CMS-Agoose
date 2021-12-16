<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Post extends Model
{
    use HasFactory;
     protected $fillable = [
        'videoId','channelId','channelTitle', 'title','description','categories','published','featured','thumbnail','views'
    ];
    
    public function setCategoriesAttribute($value)
    {
        $this->attributes['categories'] = json_encode($value);
    }
  
    public function getCategoriesAttribute($value)
    {
        return $this->attributes['categories'] = json_decode($value);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = stripslashes($value);
    }
  
    public function getDescriptionAttribute($value)
    {
        return $this->attributes['description'] = stripslashes($value);
    }

    public function scopeWhereDateBetween($query,$fieldName,$fromDate,$todate)
    {
        return $query->whereDate($fieldName,'>=',$fromDate)->whereDate($fieldName,'<=',$todate);
    }
}
