<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class Admin extends Controller
{

    public function __construct() {
        //检查用户是否登录
        //未登录用户跳到登录页面
        $this->middleware('auth',[
           'except'=>['']
        ]);
    }

    //后台首页
    public function home() {
        //菜单高亮
        $on = 1;
        $title = '后台首页';

        $article = DB::table('articles')->where('is_show', '1')->orderBy('id','desc')->paginate(10);

        if ($article){
            foreach ($article as $k => $g){
                $article[$k]->cate_name = DB::table('categories')->where('id', $g->category_id)->value('name');
                $article[$k]->is_show = $g->is_show == 1 ? '显示' : '隐藏';
            }
        }

        return view('admin.home.home', compact('on', 'title', 'article'));
    }

    //查看文章
    public function detail(Article $article) {
        //菜单高亮
        $on = 1;
        $title = '文章详情';

        //分类
        $cate_name = DB::table('categories')->where("id", $article->category_id)->value('name');

        return view('admin.home.detail', compact('on', 'title', 'article', 'cate_name'));

    }


}
