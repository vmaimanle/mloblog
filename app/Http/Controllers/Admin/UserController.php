<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Handlers\ImageUploadHandler;


class UserController extends Controller
{

    public function __construct() {
        //检查用户是否登录
        //未登录用户跳到登录页面
        $this->middleware('auth',[
            'except'=>['']
        ]);
    }


    //用户编辑页面
    public function edit(User $user) {
        //菜单高亮
        $on = 1;
        $title = '用户设置';

        return view('admin.user.edit', compact('on','title', 'user'));
    }

    //用户修改资料
    public function update(User $user, Request $request) {
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'required|confirmed'
        ]);

        $user->update([
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin');

    }

    //头像页面
    public function editAvatar(User $user)
    {
        //菜单高亮
        $on = 1;
        $title = '用户设置';

        return view('admin.user.edit_avatar', compact('user', 'on', 'title'));
    }

    //修改头像内容
    public function updateAvatar(User $user,Request $request,ImageUploadHandler $uploader)
    {
        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', 1);

            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }

        $user->update([
            'avatar' => $data['avatar']
        ]);

        return redirect()->route('users.edit_avatar', $user->id)->with('success', '更新成功');
    }

}
