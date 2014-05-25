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
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-lg-offset-9 columns">
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
                <div class="col-lg-8 columns">
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
            <div class="row">
                <nav class="navbar navbar-default" role="navigation">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="/"><i class="fa fa-home"></i></a></li>
                            <li><a href="/player/search"><i class="fa fa-search"></i></a></li>
                            <li><a href="/squad/builder"><i class="fa fa-wrench"></i></a></li>
                            <li><a href="/squad/search"><i class="fa fa-users"></i></a></li>
                            <li data-tooltip class="tip-right" title="Shortlist">
                                <a href="#">
                                    <i class="fa fa-list"></i>
                                </a>
                            </li>
                        </ul>
                        <form class="navbar-form form-inline navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Link</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
                <div class="contain-to-grid sticky">
                    <nav class="top-bar" data-topbar>

                        <section class="top-bar-section">
                            <ul class="right">
                                <li class="active"><a href="#">Right Button Active</a></li>
                                <li class="has-dropdown">
                                    <a href="#">Right Button Dropdown</a>
                                    <ul class="dropdown">
                                        <li><a href="#">First link in dropdown</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="left">
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
                                <li class="has-form">
                                    {{ Form::open(['method' => 'get', 'route' => 'search.global.player']) }}
                                    <div class="row collapse">
                                        <div class="col-lg-8 small-9 columns">
                                            {{ Form::text('global_search', '', ['placeholder' => 'Searchy search']) }}
                                        </div>
                                        <div class="col-lg-4 small-3 columns">
                                            {{ Form::submit('Search', ['class' => 'alert button expand' ]) }}
                                        </div>
                                    </div>
                                    {{ Form::close() }}
                                </li>
                            </ul>
                        </section>
                    </nav>
                </div>
            </div>

            @if(Request::is('admin*'))
            <div class="row">
                <div class="col-lg-12 columns">
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
                <div class="col-lg-12 columns">
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
                <div class="col-lg-12 columns">
                    <div class="text-center">
                        <p>In memory of Brad</p>
                    </div>
                </div>
            </footer>
        </div>

    </div>

    <script src="/assets/js/foundation.js"></script>
    <script src="/assets/js/app.js"></script>
</body>
</html>
@show
