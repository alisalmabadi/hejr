<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleCategory;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\User;

class ArticleCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['article_category_show','article_category_show_f']);
    }


    public function index()
    {
        $article_categories=ArticleCategory::all();

        return view('admin.blog.article_category_show',compact('article_categories'));

    }

    public function create(Request $request)
    {
        return view('admin.blog.article_category_add');
    }




    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'slug'=>'required|unique:article_categories',
            'image'=>'required|mimes:jpg,jpeg,png|max:10000'
        ],[
            'name.required'=>'وارد کردن نام برای دسته الزامی است', 
            'slug.unique'=>'این نام باید یکتا باشد',
            'image.required' => 'لطفا عکس انتخاب کنید',
            'image.mimes' => 'فرمت انتخاب شده پشتیبانی نمیشود',
            'image.max' => 'حجم فایل انتخاب شده بیش از حد مجاز می باشد'
        ]);

        //upload image
        $filename = 'article_category_'.time().'.'.$request['image']->getClientOriginalExtension();
        $imageUrl = 'images/article/category';
        $request['image']->move($imageUrl, $filename);
        $request['img'] = $imageUrl.'/'.$filename;


        $article_category = ArticleCategory::create([

        'name'=>$request->name,
        'desc'=>$request->desc,
        'slug'=>$request->slug,
        'img'=>$request->img
    ]);

        flash('دسته مقاله ثبت شد','success');
        return redirect()->route('admin.article_category.index');
    }

    public function update(Request $request,ArticleCategory $articleCategory)
    {
        if(!empty($request['image'])){
            //upload image
            $filename = 'article_category_'.time().'.'.$request['image']->getClientOriginalExtension();
            $imageUrl = 'images/article/category';
            $request['image']->move($imageUrl, $filename);
            $request['img'] = $imageUrl.'/'.$filename;
        }
        else{
            $request['img'] = $articleCategory->img;
        }

        if($articleCategory->slug!=$request->slug)
        {
            $this->validate($request,[
                'name'=>'required',
                'slug'=>'required|unique:article_categories',
                'image'=>'nullable|image|mimes:jpg,jpeg,png|max:10000'
            ],[
                'name.required'=>'وارد کردن نام برای دسته الزامی است', 
                'slug.unique'=>'این نام باید یکتا باشد',
                'image.required' => 'لطفا عکس انتخاب کنید',
                'image.mimes' => 'فرمت انتخاب شده پشتیبانی نمیشود',
                'image.max' => 'حجم فایل انتخاب شده بیش از حد مجاز می باشد'
            ]);
           $articleCategory->update(['name'=>$request->name,'slug'=>$request->slug,'img'=>$request->img,'desc'=>$request->desc]);
        }else
        {
            $this->validate($request,[
                'name'=>'required',
                'image'=>'nullable|image|mimes:jpg,jpeg,png|max:10000'
            ],[
                'name.required'=>'وارد کردن نام برای دسته الزامی است', 
                'slug.unique'=>'این نام باید همتا باشد',
                'image.mimes' => 'فرمت انتخاب شده پشتیبانی نمیشود',
                'image.max' => 'حجم فایل انتخاب شده بیش از حد مجاز می باشد'
            ]);

            $articleCategory->update(['name'=>$request->name,'img'=>$request->img,'desc'=>$request->desc]);

        }







        flash('دسته مقاله ویرایش شد','success');
        return redirect(route('admin.article_category.index'));

    }
    public function edit(ArticleCategory $articleCategory) {


        $article_category=$articleCategory;

        return view('admin.blog.article_category_edit',compact('article_category'));



    }


    public function destroy(Request $request,ArticleCategory $articleCategory)
    {
        $articleCategory->destroy($request->input('selected' ));
        flash('دسته مقاله حذف شد','danger');
        return back();

    }
    public function slug(Request $request)
    {
        $validator=\Validator::make($request->all(),[
            'slug'=>'required|unique:article_categories'
        ]);
        if($validator->passes())
        {
            return 1;
        }else
            return 0;

    }

    public function article_category_show(ArticleCategory $article_category)
    {

        $articles=$article_category->articles()->paginate(6);
        $articles->withPath(route('article_category_show_f',$article_category));
        $users=User::all();
        return view('blog.article_category',compact('article_category','articles','article_categories','users'));
    }

    public function article_category_show_f(ArticleCategory $article_category,Request $request)
    {
        $articles=Article::paginate(6);
        $articles->withPath(route('article_category_show_f',$article_category));
        if($request->user_ids && $request->search && $request->category_ids)
        {

            $articles=Article::whereIn('user_id',$request->user_ids)->where('title','LIKE','%'.$request->search.'%')->whereIn('article_category_id',$request->category_ids)->paginate(6);




            $user_A='';
            foreach ($request->user_ids as $s)
            {
                $user_A.='&user_ids[]='.$s;
            }
            $a_c_A='';
            foreach ($request->category_ids as $s)
            {
                $a_c_A.='&category_ids[]='.$s;
            }

            $articles->withPath( route('article_category_show_f',$article_category).'?search='.$request->search.$user_A.$a_c_A);

        }elseif($request->user_ids && $request->category_ids)
        {
            $articles=Article::whereIn('user_id',$request->user_ids)->whereIn('article_category_id',$request->category_ids)->paginate(6);




            $user_A='';
            foreach ($request->user_ids as $s)
            {
                $user_A.='&user_ids[]='.$s;
            }
            $a_c_A='';
            foreach ($request->category_ids as $s)
            {
                $a_c_A.='&category_ids[]='.$s;
            }

            $articles->withPath( route('article_category_show_f',$article_category).'?'.$user_A.$a_c_A);


        }elseif ($request->user_ids && $request->search )
        {
            $articles=Article::whereIn('user_id',$request->user_ids)->where('title','LIKE','%'.$request->search.'%')->paginate(6);




            $user_A='';
            foreach ($request->user_ids as $s)
            {
                $user_A.='&user_ids[]='.$s;
            }
            $a_c_A='';

            $articles->withPath( route('article_category_show_f',$article_category).'?search='.$request->search.$user_A);


        }
        elseif ( $request->search && $request->category_ids)
        {
            $articles=Article::where('title','LIKE','%'.$request->search.'%')->whereIn('article_category_id',$request->category_ids)->paginate(6);


            $a_c_A='';
            foreach ($request->category_ids as $s)
            {
                $a_c_A.='&category_ids[]='.$s;
            }

            $articles->withPath( route('article_category_show_f',$article_category).'?search='.$request->search.$a_c_A);


        }
        elseif ( $request->search && $request->category_ids)
        {
            $articles=Article::where('title','LIKE','%'.$request->search.'%')->whereIn('article_category_id',$request->category_ids)->paginate(6);


            $a_c_A='';
            foreach ($request->category_ids as $s)
            {
                $a_c_A.='&category_ids[]='.$s;
            }

            $articles->withPath( route('article_category_show_f',$article_category).'?search='.$request->search.$a_c_A);


        }
        elseif ( $request->search )
        {
            $articles=Article::where('title','LIKE','%'.$request->search.'%')->paginate(6);


            $articles->withPath( route('article_category_show_f',$article_category).'?search='.$request->search);
        }
        elseif ($request->category_ids)
        {

            $articles=Article::whereIn('article_category_id',$request->category_ids)->paginate(6);


            $a_c_A='';
            foreach ($request->category_ids as $s)
            {
                $a_c_A.='&category_ids[]='.$s;
            }

            $articles->withPath( route('article_category_show_f',$article_category).'?'.$a_c_A);


        }
        elseif($request->user_ids)
        {
            $articles=Article::whereIn('user_id',$request->user_ids)->paginate(6);




            $user_A='';
            foreach ($request->user_ids as $s)
            {
                $user_A.='&user_ids[]='.$s;
            }

            $articles->withPath( route('article_category_show_f',$article_category).'?'.$user_A);


        }




        return view('blog.article_category_f',compact('articles'));
    }


}
