@section('before-content')
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('meta-title', 'Fifa Ultimate Team Database')</title>

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600,700' rel='stylesheet' type='text/css'>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <link rel="stylesheet" href="/assets/css/global.css">
    <script src="/assets/js/jquery-ui.js"></script>
    <script src="/assets/js/modernizr.js"></script>
    <script src="/assets/vendor/ckeditor/ckeditor.js"></script>
</head>
<body>
<div id="nav">
    <ul id="site-nav" class="side-nav">
        <li>
            <a href="/">
                <i class="fa fa-home"></i>
            </a>
        </li>
        <li>
            <a href="/player/search">
                <i class="fa fa-search"></i>
            </a>
        </li>
        <li>
            <a href="/squad/builder">
                <i class="fa fa-wrench"></i>
            </a>
        </li>
        <li>
            <a href="/squad/search">
                <i class="fa fa-users"></i>
            </a>
        </li>
        <li data-tooltip class="tip-right" title="Shortlist">
            <a href="#">
                <i class="fa fa-list"></i>
            </a>
        </li>
    </ul>
</div>
<div id="content">
    <div class="row">
        <div class="large-3 large-offset-9 columns">
            <ul class="inline-list right">
                @if (Auth::guest())
                <li><a href="/register">Register</a></li>
                <li><a href="/login">Log In</a></li>
                @else
                <li><a href="/logout">Log Out</a></li>
                @endif
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="large-4 columns">
            <div class="search-input">
                <i class="fa fa-search fa-2x"></i> <input type="text" placeholder="Player search" id="tags">
            </div>
            <h1>@yield('page-heading', 'Page Headerings')</h1>
        </div>
        <div class="large-8 columns">
            <div class="right">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- ATF - Global -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:728px;height:90px"
                     data-ad-client="ca-pub-9669964754344156"
                     data-ad-slot="4401896481"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
    </div>

    <hr class="dashed">

    @if(Request::is('admin*'))
        <div class="row">
            <div class="large-12 columns">
                <dl class="sub-nav">
                <dt>Admin:</dt>
                  <dd class="active"><a href="{{ URL::route('admin') }}">Home</a></dd>
                  <dd><a href="{{ URL::route('admin.totw') }}">Create TOTW</a></dd>
                  <dd><a href="{{ URL::route('admin.player') }}">Create Player</a></dd>
                  <dd><a href="#">Suspended</a></dd>
              </dl>
            </div>
        </div>
    @endif

    @show

    @yield('content')

    @section('after-content')

    <hr class="dashed">

    <div class="row">
        <div class="large-12 columns">
            <div class="right">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- BTF - Global -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:728px;height:90px"
                     data-ad-client="ca-pub-9669964754344156"
                     data-ad-slot="5878629689"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
    </div>
    <footer class="row">
        <div class="large-12 columns">
            <div class="text-center">
                <p>In memory of Brad</p>
            </div>
        </div>
    </footer>

</div>

<script src="/assets/js/foundation.js"></script>
<script src="/assets/js/app.js"></script>
</body>
</html>
@show
