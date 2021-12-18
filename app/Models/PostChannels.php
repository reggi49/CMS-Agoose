<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostChannels extends Model
{
    use HasFactory;
     protected $fillable = [
        'channel_id','channel_title','thumbnail','description'
    ];
}
