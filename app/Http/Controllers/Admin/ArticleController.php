<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{

    public function __construct() {
        //检查用户是否登录
        //未登录用户跳到登录页面
        $this->middleware('auth',[
            'except'=>['']
        ]);
    }
    //文章列表
    public function index(Request $request) {

        //搜索
        $cate_id = $request->cate_id;
        $keyword = $request->keyword;

        //菜单高亮
        $on = 2;
        $title = '文章列表';
        $cate = Category::where('status', '1')->get();

        if ($cate_id && $keyword){
            $article = Article::where('category_id', 'like', "%$cate_id%" AND 'title', 'like', "%$keyword%")->orderBy('id','desc')->paginate(10);
        }elseif ($cate_id){
            $article = Article::where('category_id', 'like', "%$cate_id%")->orderBy('id','desc')->paginate(10);
        }elseif ($keyword){
            $article = Article::where('title', 'like', "%$keyword%")->orderBy('id','desc')->paginate(10);
        }else{
            $article = Article::orderBy('id','desc')->paginate(10);
        }

        if ($article){
            foreach ($article as $k => $g){
                $article[$k]->cate_name = Category::where('id',$g->category_id)->value('name');
                $article[$k]->is_show = $g->is_show == 1 ? '显示' : '隐藏';
            }
        }


        return view('admin.article.index', compact('on', 'title', 'article', 'cate'));
    }

    //添加文章列表
    public function create() {

        $title = '添加文章';
        $on = 2;

        //分类
        $cate = Category::all();

        return view('admin.article.create', compact('on', 'title', 'cate'));
    }

    //添加文章内容
    public function store(Request $request) {

        $this->validate($request, [
           'title' => 'required',
            'content' => 'required'
        ]);

        $is_show = $request->is_show;

        //是否隐藏
        if ($is_show){
            $is_show = 1;
        }else{
            $is_show = 0;
        }

        Article::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'is_show' => $is_show,
            'content' => $request->content
        ]);

        return redirect()->route('article.index');
    }

    //编辑文章列表
    public function edit(Article $article) {
        $title = '编辑文章';
        $on = 2;

        //分类
        $cate = Category::all();

        return view('admin.article.edit', compact('on', 'title', 'cate', 'article'));
    }

    //编辑文章内容
    public function update(Article $article, Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $is_show = $request->is_show;

        //是否隐藏
        if ($is_show){
            $is_show = 1;
        }else{
            $is_show = 0;
        }

        $article->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'is_show' => $is_show,
            'content' => $request->content
        ]);

        return redirect()->route('article.index');
    }


    //删除文章
    public function destroy(Article $article) {
        $article->delete();
        session()->flash('success', '成功删除文章！');
        return back();
    }


}


