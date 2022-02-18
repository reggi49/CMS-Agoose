<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSeo extends Model
{
    use HasFactory;
     protected $fillable = [
        'id_posts','id_users','view','comment','like'
    ];
}
