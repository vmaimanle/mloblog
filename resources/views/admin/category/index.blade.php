<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title}}</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/imges/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/imges/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <script src="/js/echarts.min.js"></script>
    <link rel="stylesheet" href="/css/amazeui.min.css" />
    <link rel="stylesheet" href="/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="/css/app2.css">
    <script src="/js/jquery-3.3.1.min.js"></script>

</head>

<body data-type="index">
<script src="/js/theme.js"></script>
<div class="am-g tpl-g">
    <!-- 头部 -->
    <header>
        <!-- logo -->
        <div class="am-fl tpl-header-logo">
            <a href="javascript:;"><img src="/imges/logo.png" alt=""></a>
        </div>
        <!-- 右侧内容 -->
        <div class="tpl-header-fluid">

        @include('admin.shared._messages')
        <!-- 其它功能-->
            <div class="am-fr tpl-header-navbar">
                <ul>
                    <!-- 欢迎语 -->
                    <li class="am-text-sm tpl-header-navbar-welcome">
                        <a href="javascript:;">欢迎你, <span>{{ Auth::user()->name }}</span> </a>
                    </li>

                    <!-- 退出 -->
                    <li class="am-text-sm" id="logout" style="cursor: pointer;">
                        <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a>
                                <span class="am-icon-sign-out"></span> 退出
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

    </header>
    <!-- 风格切换 -->
    <div class="tpl-skiner">
        <div class="tpl-skiner-toggle am-icon-cog">
        </div>
        <div class="tpl-skiner-content">
            <div class="tpl-skiner-content-title">
                选择主题
            </div>
            <div class="tpl-skiner-content-bar">
                <span class="skiner-color skiner-white" data-color="theme-white"></span>
                <span class="skiner-color skiner-black" data-color="theme-black"></span>
            </div>
        </div>
    </div>
    <!-- 侧边导航栏 -->
    <div class="left-sidebar">
        <!-- 用户信息 -->
        <div class="tpl-sidebar-user-panel">
            <div class="tpl-user-panel-slide-toggleable">
                <div class="tpl-user-panel-profile-picture">
                    <img style="width: 82px;" src="{{Auth::user()->avatar}}" alt="">
                </div>
                <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
                    {{ Auth::user()->name }}
          </span>
                <a href="{{route('users.edit', Auth::user()->id)}}" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
            </div>
        </div>

        <!-- 菜单 -->
        <ul class="sidebar-nav">
            <li class="sidebar-nav-heading">Menu <span class="sidebar-nav-heading-info"> 菜单</span></li>
            <li class="sidebar-nav-link">
                <a href="{{route("admin")}}" @if (($on) == 1) class="active" @endif>
                    <i class="am-icon-home sidebar-nav-link-logo"></i> 首页
                </a>
            </li>
            <li class="sidebar-nav-link">
                <a href="{{route("article.index")}}" @if (($on) == 2) class="active" @endif>
                    <i class="am-icon-bars sidebar-nav-link-logo"></i> 文章列表
                </a>
            </li>
            <li class="sidebar-nav-link">
                <a href="{{route("category.index")}}" @if (($on) == 3) class="active" @endif>
                    <i class="am-icon-star sidebar-nav-link-logo"></i> 分类列表
                </a>
            </li>

        </ul>
    </div>

    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">
        <div class="row-content am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title  am-cf">分类列表</div>


                        </div>
                        <div class="widget-body  am-fr">

                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                <div class="am-form-group">
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <div  id="add" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="am-u-sm-12">
                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black">
                                    <thead>
                                    <tr>
                                        <th style="width: 100px;">ID</th>
                                        <th style="width: 250px;">名称</th>
                                        <th style="width: 250px;">状态</th>
                                        <th style="width: 300px;">添加时间</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($category as $g)
                                    <tr class="gradeX">
                                        <td>{{$g->id}}</td>
                                        <td>{{$g->name}}</td>
                                        <td>{{$g->status}}</td>
                                        <td>{{$g->created_at}}</td>
                                        <td>
                                            <div class="tpl-table-black-operation">
                                                <a href="javascript:;">
                                                    <form action="{{ route('category.edit', $g->id) }}" method="get">
                                                    <i class="am-icon-pencil"></i> <button style="border: 0;background-color: transparent;outline: none;padding: 0;">编辑</button>
                                                    </form>
                                                </a>
                                                <a class="tpl-table-black-operation-del">
                                                    <form action="{{ route('category.destroy', $g->id) }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    <i class="am-icon-trash"></i> <button style="border: 0;background-color: transparent;outline: none;padding: 0;">删除</button>
                                                    </form>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <!-- more data -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="am-u-lg-12 am-cf">
                                <div class="am-fr">
                                  {{$category->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="/js/amazeui.min.js"></script>
<script src="/js/amazeui.datatables.min.js"></script>
<script src="/js/dataTables.responsive.min.js"></script>
<script src="/js/app2.js"></script>

</body>

</html>

<script>
    $(function () {
        $('#add').click(function () {
            window.location.href = '{{route('category.create')}}'
        })
        $('#logout').click(function () {
            $('form').submit();
        })
    })
</script>
