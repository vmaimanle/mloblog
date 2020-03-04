<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Miraclo的博客</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="icon" type="image/png" href="/imges/favicon.png">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="/imges/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
  <link rel="apple-touch-icon-precomposed" href="/imges/app-icon72x72@2x.png">
  <meta name="msapplication-TileImage" content="/imges/app-icon72x72@2x.png">
  <meta name="msapplication-TileColor" content="#0e90d2">
  <link rel="stylesheet" href="/css/home/amazeui.min.css">
  <link rel="stylesheet" href="/css/home/app.css">
</head>

<body id="blog">

<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header">
    <div class="am-u-sm-8 am-u-sm-centered">
        <h2 class="am-hide-sm-only">欢迎来到Miraclo的博客</h2>
    </div>
</header>
<hr>
<nav class="am-g am-g-fixed blog-fixed blog-nav">
<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button" data-am-collapse="{target: '#blog-collapse'}" ><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="blog-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
        <li @if($cate_id == 0)class="am-active" @endif >
            <a style="cursor: pointer;" href="{{route('index', 0)}}">
                首页
            </a>
        </li>
        @foreach($cate as $g)
        <li @if($cate_id == $g->id) class="am-active" @endif>
            <a style="cursor: pointer;" href="{{route('index', $g->id)}}">
                {{$g->name}}
            </a>
        </li>
        @endforeach
    </ul>
    <form class="am-topbar-form am-topbar-right am-form-inline" role="search">
      <div class="am-form-group">
        <form method="post" action="{{route('index_search')}}">
            {{ csrf_field() }}
            <input name="keyword" type="text" class="am-form-field am-input-sm" placeholder="搜索">
        </form>
      </div>
    </form>
  </div>
</nav>
<hr>


<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed">
    <div class="am-u-md-8 am-u-sm-12">

        @foreach($rs as $g)
        <article class="am-g blog-entry-article">
            <div class="am-u-lg-12 am-u-md-12 am-u-sm-12 blog-entry-text">
                <span><a href="javascript:;" class="blog-color">@Miraclo &nbsp;</a></span>
                <span>{{$g->created_at}}</span>
                <h1><a href="{{route('index_detail', $g->id)}}">{{$g->title}}</a></h1>
                <p>
                    {{str_limit($g->content,80,'....')}}
                </p>
                <p><a href="" class="blog-continue">continue reading</a></p>
                <div style="float: right;">
                    <span style="color: #666">阅读（{{$g->clicks}}）</span>
                </div>
            </div>
        </article>
        @endforeach
        <ul class="am-pagination">
            {{$rs->links('home.home_page')}}
        </ul>
    </div>

    <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>About ME</span></h2>
            <img src="/imges/tou.jpg" alt="about me" class="blog-entry-img" >
            <p>Miraclo</p>
            <p>
        欢迎来到我的博客，这里记录和发布了一些技术文章，让我们在不断的学习当中充实自己，每天都进步一点点。
        </p>
        </div>
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>Contact ME</span></h2>
            <p>
                <span class="am-icon-qq am-icon-fw am-primary blog-icon" data-am-popover="{content: 'qq: 597738979'}"></span>
                {{--<span class="am-icon-weixin am-icon-fw blog-icon" data-am-popover="{content: 'wx: manle00'}"></span>--}}
            </p>
        </div>
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-title"><span>么么哒</span></h2>
            <ul class="am-list">
                <li><a href="#">每个人都有一个死角， 自己走不出来，别人也闯不进去。</a></li>
                <li><a href="#">我把最深沉的秘密放在那里。</a></li>
                <li><a href="#">你不懂我，我不怪你。</a></li>
                <li><a href="#">每个人都有一道伤口， 或深或浅，盖上布，以为不存在。</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- content end -->


 <footer class="blog-footer">
    <div class="blog-text-center">Copyright ©{{date('Y', time())}} 备案号：粤ICP备19071193</div>
  </footer>



<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/js/home/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/js/home/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="/js/home/amazeui.min.js"></script>
<!-- <script src="assets/js/home/app.js"></script> -->
</body>
</html>
