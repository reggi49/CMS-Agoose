<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsSeo extends Model
{
    use HasFactory;
     protected $fillable = [
        'id_posts','id_users','comment'
    ];
}
