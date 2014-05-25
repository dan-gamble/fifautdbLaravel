<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Fifa Ultimate Team Database</title>

	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600,700' rel='stylesheet' type='text/css'>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

	<link rel="stylesheet" href="/assets/css/global.css" />
	<script src="/assets/js/jquery-ui.js"></script>
	<script src="/assets/js/modernizr.js"></script>
</head>
<body>
	<!-- <div id="nav">
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
				<a href="/squad/search">
					<i class="fa fa-users"></i>
				</a>
			</li>
			<li>
				<a href="/squad/builder">
					<i class="fa fa-wrench"></i>
				</a>
			</li>
			<li data-tooltip class="tip-right" title="Shortlist">
				<a href="#">
					<i class="fa fa-list"></i>
				</a>
			</li>
		</ul>
	</div> -->
	<div id="content">
		<div class="row">
			<div class="col-lg-4 columns">
				<div class="search-input">
					<i class="fa fa-search fa-2x"></i> <input type="text" placeholder="Player search" id="tags">
				</div>
				<h1>Page headerings</h1>
			</div>
			<div class="col-lg-8 columns">
				<img class="right" src="http://placehold.it/728x90">
			</div>
		</div>

		<hr class="dashed">

		@yield('content')

		<hr class="dashed">

		<div class="row">
			<div class="col-lg-12 columns">
				<img class="right" src="http://placehold.it/728x90">
			</div>
		</div>

	</div>

	<script src="/assets/js/foundation.js"></script>
	<script src="/assets/js/app.js"></script>
</body>
</html>
