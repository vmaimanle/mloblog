<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    //分类列表
    public function index() {
        $title = '分类列表';
        $on = 3;
        $category = Category::paginate(10);

        if ($category){
            foreach ($category as $k => $g){
                $category[$k]->status = $g->status == 1 ? '显示' : '隐藏';
            }
        }

        return view('admin.category.index', compact('on', 'category', 'title'));
    }

    //分类添加列表
    public function create() {
        $title = '添加分类';
        $on = 3;
        return view('admin.category.create', compact('on',  'title'));

    }

    //分类添加内容
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $is_show = $request->is_show;

        //是否隐藏
        if ($is_show){
            $is_show = 1;
        }else{
            $is_show = 0;
        }

        Category::create([
            'name' => $request->name,
            'status' => $is_show
        ]);

        return redirect()->route('category.index');

    }

    //编辑文章列表
    public function edit(Category $category) {
        $title = '编辑分类';
        $on = 3;

        return view('admin.category.edit', compact('on', 'title', 'category'));
    }

    //编辑文章内容
    public function update(Category $category, Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $is_show = $request->is_show;

        //是否隐藏
        if ($is_show){
            $is_show = 1;
        }else{
            $is_show = 0;
        }

        $category->update([
            'name' => $request->name,
            'status' => $is_show
        ]);

        return redirect()->route('category.index');
    }


    //删除文章
    public function destroy(Category $category) {
        $category->delete();
        session()->flash('success', '成功删除分类！');
        return back();
    }




}
