<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
	protected $fillable=['name'];

	public function categories()
	{

		return $this->belongsToMany('App\Category','category_keyword');

	}

	public function products()
	{

		return $this->belongsToMany('App\Products','keyword_product');

	}

	public function pages()
	{

		return $this->belongsToMany('App\Pages','keyword_pages');

	}


}
