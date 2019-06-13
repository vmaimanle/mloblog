<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //允许修改这些字段
    protected $fillable = [
        'title', 'category_id', 'is_show', 'content'
    ];
}
