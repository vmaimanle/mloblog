<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    //首页
    public function index(Request $request) {
        $cate_id = $request->cate_id;

        //搜索
        $keyword = $request->keyword;

        //分类
        $cate = Category::all();

        if ($keyword){
            //首页显示全部
            if ($cate_id == 0){
                $rs = Article::where('is_show', '1')->where('title', 'like', "%$keyword%")->orderBy('id', 'DESC')->paginate(8);
            }else{
                $rs = Article::where('is_show', '1')->where('category_id', $cate_id)->where('title', 'like', "%$keyword%")->orderBy('id', 'DESC')->paginate(8);
            }
        }else{
            if ($cate_id == 0){
                $rs = Article::where('is_show', '1')->orderBy('id', 'DESC')->paginate(8);
            }else{
                $rs = Article::where('is_show', '1')->where('category_id', $cate_id)->orderBy('id', 'DESC')->paginate(8);
            }
        }

        if ($rs){
            foreach ($rs as $k => $g){
                $rs[$k]->content = strip_tags(str_replace('&nbsp;','',$g->content));

                //dd($rs[$k]->content);exit();
            }
        }

        return view('home.home', compact('rs', 'cate', 'cate_id'));
    }

    //文章详情
    public function detail(Article $article) {
        //分类
        $cate = Category::all();
        $cate_name = Category::where('id', $article->category_id)->value('name');

        //增加阅读数量
        Article::where('id',$article->id)->increment('clicks');


        //上一篇文章
        $p_id = $article->id - 1;
        $per = Article::where('id', $p_id)->first();
        if ($per){
            $per_title = $per->title;
            $per_id = $per->id;
        }else{
            $per_title = '';
            $per_id = '';
        }

        //下一篇文章
        $n_id = $article->id + 1;
        $next = Article::where('id', $n_id)->first();
        if ($next){
            $next_title = $next->title;
            $next_id = $next->id;
        }else{
            $next_title = '';
            $next_id = '';
        }

        return view('home.detail', compact('article', 'cate', 'cate_name', 'per_title', 'per_id', 'next_title', 'next_id'));
    }





}



