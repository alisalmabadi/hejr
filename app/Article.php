<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public  $created_atp;
    protected  $fillable=[
        'article_category_id',
        'order',
        'title',
        'body',
        'seo_title',
        'img',
        'slug',
        'seo_desc',
        'img_thumbnail',
        'category_id',
        'user_id',
        'product_id',
        ];
    public function article_category()
    {
        return $this->belongsTo('App\ArticleCategory');
    }

    public function keywords()
    {
        return $this->belongsToMany('App\Keyword','article_keyword');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getPersianDateAttribute()
    {

        $v=new \Verta($this->created_at);
        return $v->format('%B %d، %Y');

    }


}
