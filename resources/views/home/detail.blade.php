<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>article no sidebar  | Amaze UI Examples</title>
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

<body id="blog-article-sidebar">
<!-- header start -->
<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header">
    <div class="am-u-sm-8 am-u-sm-centered">
        <img width="200" src="http://s.amazeui.org/media/i/brand/amazeui-b.png" alt="Amaze UI Logo"/>
        <h2 class="am-hide-sm-only">欢迎来到Miraclo的博客</h2>
    </div>
</header>
<!-- header end -->
<hr>

<!-- nav start -->
<nav class="am-g am-g-fixed blog-fixed blog-nav">
<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button" data-am-collapse="{target: '#blog-collapse'}" ><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="blog-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav">
            @foreach($cate as $g)
                <li @if($article->category_id == $g->id) class="am-active" @endif>
                    <a style="cursor: pointer;" href="{{route('index', $g->id)}}">
                        {{$g->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
<!-- nav end -->
<hr>
<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed blog-content">
    <div class="am-u-sm-12">
      <article class="am-article blog-article-p">
        <div class="am-article-hd">
          <h1 class="am-article-title blog-text-center">{{$article->title}}</h1>
          <p class="am-article-meta blog-text-center">
              <span><a href="#" class="blog-color">{{$cate_name}} &nbsp;</a></span>-
              <span><a href="#">{{$article->created_at}}</a></span>
          </p>
        </div>        
        <div class="am-article-bd">
            {!! $article->content !!}
        </div>
      </article>

        <hr>
        <ul class="am-pagination blog-article-margin">
        @if($per_id)
          <li class="am-pagination-prev"><a href="{{route('index_detail', $per_id)}}" class="">&laquo; {{$per_title}}</a></li>
        @endif
        @if($next_id)
          <li class="am-pagination-next"><a href="{{route('index_detail', $next_id)}}">{{$next_title}} &raquo;</a></li>
        @endif
        </ul>

        <hr>

        {{--<form class="am-form am-g">--}}
            {{--<h3 class="blog-comment">评论</h3>--}}
          {{--<fieldset>--}}
            {{--<div class="am-form-group am-u-sm-4 blog-clear-left">--}}
              {{--<input type="text" class="" placeholder="名字">--}}
            {{--</div>--}}
            {{--<div class="am-form-group am-u-sm-4">--}}
              {{--<input type="email" class="" placeholder="邮箱">--}}
            {{--</div>--}}

            {{--<div class="am-form-group am-u-sm-4 blog-clear-right">--}}
              {{--<input type="password" class="" placeholder="网站">--}}
            {{--</div>--}}
        {{----}}
            {{--<div class="am-form-group">--}}
              {{--<textarea class="" rows="5" placeholder="一字千金"></textarea>--}}
            {{--</div>--}}
        {{----}}
            {{--<p><button type="submit" class="am-btn am-btn-default">发表评论</button></p>--}}
          {{--</fieldset>--}}
        {{--</form>--}}

        <hr>
    </div>
</div>
<!-- content end -->

<footer class="blog-footer">
    <div class="blog-text-center">Copyright ©{{date('Y', time())}} Miraclo</div>
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
<!-- <script src="/js/home/app.js"></script> -->
</body>
</html>