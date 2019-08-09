<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArticleCategory;
use App\Article;
use App\Category;
use App\Product;
use App\User;
use Illuminate\Support\Str;
use App\Keyword;

class ArticleController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin')->except(['show_article','article_show']);
    }

    public function index()
    {
        $articles=Article::all();
        $article_categories=ArticleCategory::all();
        
        return view('admin.blog.article_show',compact('article_categories','articles'));
    }


    public function create() {
        $article_categories=ArticleCategory::all();
        // $categories=Category::all();
        // $products=Product::all();
        $users=User::all();
        $keywords=Keyword::all();
        return view('admin.blog.article_add',compact('article_categories','categories','keywords','products','users'));
    }

    public function store(Request $request)
    {

        $messages=array(

            'title.required'=>'وارد کردن عنوان مقاله الزامی است',


            'slug.required'=>'وارد کردن کلید ادرس یکتا الزامی است',
            'slug.unique'=>'کلید ادرس یکتا تکراری است',
            'article_category_id.not_in'=>'دسته مقاله درست انتخاب نشده !',
            'category_id.not_in'=>'دسته محصول مرتبط درست انتخاب نشده !',
            'product_id.not_in'=>'محصول مرتبط درست انتخاب نشده !',
            'user_id.not_in'=>'نویسنده درست انتخاب نشده !',

            'image_thumbnale.required' => 'تصویر بند انگشتی مقاله را انتخاب کنید',
            'image_thumbnale.mimes' => 'فایل انتخاب شده پشتیبانی نمیشود',
            'image_thumbnale.max'=>'حجم فایل انتخاب شده بیش از حد  مجاز می باشد',
            'image.required' => 'تصویر مقاله را انتخاب کنید',
            'image.mimes' => 'فایل انتخاب شده پشتیبانی نمیشود',
            'image.max'=>'حجم فایل انتخاب شده بیش از حد  مجاز می باشد',
        );

        $this->validate($request,[

            'title'=>'required',


            'slug'=>'required|unique:articles',
            'article_category_id'=>'required|not_in:0',
            'user_id'=>'required|not_in:0',

            'image_thumbnale' => 'required|mimes:jpg,jpeg,png|max:10000',
            'image' => 'required|mimes:jpg,jpeg,png|max:10000',

        ],$messages);

        //upload imageS
            $filename = 'article_thumnale_'.time().'.'.$request['image_thumbnale']->getClientOriginalExtension();
            $imageUrl = 'images/article/thumbnail';
            $request['image_thumbnale']->move($imageUrl, $filename);
            $request['img_thumbnail'] = $imageUrl.'/'.$filename;

            $filename = 'article_'.time().'.'.$request['image']->getClientOriginalExtension();
            $imageUrl = 'images/article';
            $request['image']->move($imageUrl, $filename);
            $request['img'] = $imageUrl.'/'.$filename;

        $article=Article::create($request->all());
        $final_list=array();
        $keywords=array();
        if($request->get('keywords')){
            $keywords=$request->get('keywords');}
        foreach ($keywords as $keyword)
        {
            if (!is_numeric($keyword))
            {
                $key= new Keyword();
                $nkey= $key->create(['name'=>$keyword]);
                $final_list=array_add($final_list,count($final_list ),$nkey->id);
            } else
            {
                $final_list=array_add( $final_list,count($final_list),$keyword);
            }
        }
        $article->keywords()->attach($final_list);

                flashs('مقاله ذخیره شد','success');
                return redirect(route('admin.article.index'));

    }

    public function edit(Article  $article) {
        $article_categories=ArticleCategory::all();
        // $categories=Category::all();
        // $products=Product::all();
        $users=User::all();
        $keywords=Keyword::all();
        return view('admin.blog.article_edit',compact('article','article_categories','keywords','categories','products','users'));

    }
    public function update(Article $article,Request $request)
    {
        if(!empty($request['image_thumbnale'])){
            $filename = 'article_thumnail_'.time().'.'.$request['image_thumbnale']->getClientOriginalExtension();
            $imageUrl = 'images/article/thumbnail';
            $request['image_thumbnale']->move($imageUrl, $filename);
            $request['img_thumbnail'] = $imageUrl.'/'.$filename;
        }

        if(!empty($request['image'])){
            $filename = 'article_'.time().'.'.$request['image']->getClientOriginalExtension();
            $imageUrl = 'images/article';
            $request['image']->move($imageUrl, $filename);
            $request['img'] = $imageUrl.'/'.$filename;
        }

        $messages=array(

            'title.required'=>'وارد کردن عنوان مقاله الزامی است',


            'slug.required'=>'وارد کردن کلید ادرس یکتا الزامی است',
            'slug.unique'=>'کلید ادرس یکتا تکراری است',
            'article_category_id.not_in'=>'دسته مقاله درست انتخاب نشده !',
            'category_id.not_in'=>'دسته محصول مرتبط درست انتخاب نشده !',
            'product_id.not_in'=>'محصول مرتبط درست انتخاب نشده !',
            'user_id.not_in'=>'نویسنده درست انتخاب نشده !',

            'image_thumbnale.mimes' => 'فایل انتخاب شده پشتیبانی نمیشود',
            'image_thumbnale.max'=>'حجم فایل انتخاب شده بیش از حد  مجاز می باشد',
            'image.mimes' => 'فایل انتخاب شده پشتیبانی نمیشود',
            'image.max'=>'حجم فایل انتخاب شده بیش از حد  مجاز می باشد',
        );

        if($article->slug!=$request->slug)
        {
            $this->validate($request,[

                'title'=>'required',
    
    
                'slug'=>'required|unique:articles',
                'article_category_id'=>'required|not_in:0',
                'user_id'=>'required|not_in:0',
    
                'image_thumbnale' => 'nullable|mimes:jpg,jpeg,png|max:10000',
                'image' => 'nullable|mimes:jpg,jpeg,png|max:10000',
    
            ],$messages);
            $article->update($request->except('keywords'));
        }
        else
        {
            $this->validate($request,[

                'title'=>'required',
    
                'article_category_id'=>'required|not_in:0',
                'user_id'=>'required|not_in:0',
    
                'image_thumbnale' => 'nullable|mimes:jpg,jpeg,png|max:10000',
                'image' => 'nullable|mimes:jpg,jpeg,png|max:10000',
    
            ],$messages);

            $article->update($request->except(['slug','keywords']));

        }



        $final_list=array();
        $keywords=$request->get('keywords');
        if($keywords)
        {

            foreach ($keywords as $keyword)
            {
                if (!is_numeric($keyword))
                {
                    $key= new Keyword();
                    $nkey= $key->create(['name'=>$keyword]);
                    $final_list=array_add($final_list,count($final_list ),$nkey->id);
                } else
                {
                    $final_list=array_add( $final_list,count($final_list),$keyword);
                }
            }
        }

        $article->keywords()->sync($final_list);






        flashs(' مقاله ویرایش شد','success');
                return redirect()->route('admin.article.index');




    }

    public function slug(Request $request)
    {
        $validator=\Validator::make($request->all(),[
            'slug'=>'required|unique:articles'
        ]);
        if($validator->passes())
        {
            return 1;
        }else
            return 0;

    }
    public function filter(Request $request)
    {
        $search=$request->r_search;
        $article_category_id=$request->article_category_id;

        if($article_category_id==0)
            $filter=[['title','LIKE','%'.$search.'%']];
        elseif( $article_category_id!=0)
            $filter=[['title','LIKE','%'.$search.'%'],['article_category_id','=',$article_category_id]];

        $articles=Article::where($filter)->get();
        $articles->load('article_category');
        return $articles;

    }
    public function destroy(Request $request,Article $article)
    {
        $article->destroy($request->input('selected' ));
        flashs('مقاله حدف شد','danger');
        return back();


    }

    public function show_article(Article $article)
    {
            $articles=Article::all();


        $previous =  Article::where('id','=',Article::where('id', '<', $article->id)->max('id'))->first();
        // get next user id
        $next = Article::where('id','=',Article::where('id', '>', $article->id)->min('id'))->first();



        $v=new \Verta($article->created_at);
        $article->created_atp=$v->format('%B %d، %Y');



        return view('article',compact('article','previous','next'));

    }
    public function article_show(Article $article)
    {

        $summury=Str::words($article->body, $words = 150, $end = '...');


        return view('blog.article_index',compact('article','summury'));

    }



}
