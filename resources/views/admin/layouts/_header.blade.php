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

    <script src="/js/amazeui.min.js"></script>
    <script src="/js/amazeui.datatables.min.js"></script>
    <script src="js/dataTables.responsive.min.js"></script>
    <script src="/js/app2.js"></script>

    <script src="/js/jquery.min.js"></script>

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
            <!-- 搜索 -->
            <div class="am-fl tpl-header-search">
                <form class="tpl-header-search-form" action="javascript:;">
                    <button class="tpl-header-search-btn am-icon-search"></button>
                    <input class="tpl-header-search-box" type="text" placeholder="搜索内容...">
                </form>
            </div>
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
                    <img src="{{Auth::user()->avatar}}" alt="">
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
                    <i class="am-icon-bars sidebar-nav-link-logo"></i> 分类列表
                </a>
            </li>
        </ul>
    </div>
