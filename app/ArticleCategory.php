<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table = "article_categories";
    protected  $fillable=['name','slug','img','desc'];
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
