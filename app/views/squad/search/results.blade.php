@extends('layout.master')

@section('content')
<div class="row">
	<div class="large-12 columns">
		<div class="row">
			<div class="large-12 columns">
				<div class="row ul-0">
					<div class="large-5 columns">
						<ul class="pagination">
							<li class="arrow unavailable"><a href="">&laquo;</a></li>
							<li class="current"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">4</a></li>
							<li class="unavailable"><a href="">&hellip;</a></li>
							<li><a href="">12</a></li>
							<li><a href="">13</a></li>
							<li class="arrow"><a href="">&raquo;</a></li>
						</ul>
					</div>
					<div class="large-5 large-offset-2 columns">
						<dl class="sub-nav right">
							<dt>Filter:</dt>
							<dd class="active"><a href="#">All</a></dd>
							<dd><a href="#">Active</a></dd>
							<dd><a href="#">Pending</a></dd>
							<dd><a href="#">Suspended</a></dd>
						</dl>
					</div>
				</div>
				<p>Let cards be draggable to a <code>#nav</code> 'shortlist' icon that can hold an maximum of 11 players (If the user tries to drag a 12th player in they can choose which player to replace). You can then do multiple functions with said players. Mainly start a squad builder with all players in the shortlist.</p>
				<ul class="large-block-grid-8">
					@for ($i = 1; $i < 25; $i++)
					<li class="card-container">
						<a href="/player/player">
							<div class="small-gold-rare">
								<div class="card-workrates">
									<div class="wr1"></div>
									<div class="wr2"></div>
								</div>
								<div class="card-rating">{{ $i }}</div>
								<div class="card-name">Rooney</div>
								<div class="card-position">CF</div>
								<div class="card-nation">
									<img src="http://fh13.fhcdn.com/static/img/nations/{{ $i }}.png" height="16" width="26">
								</div>
								<div class="card-club">
									<img src="http://fh13.fhcdn.com/static/img/14/clubs/{{ $i }}.png" height="27" width="27">
								</div>
								<div class="card-picture">
									<img src="http://fh13.fhcdn.com/static/img/14/players/{{ $i }}.png" height="74" width="74">
								</div>
								<div class="card-skill">
									S/M: 3 <i class="fa fa-star"></i>
								</div>
								<div class="card-foot">
									W/F: 4 <i class="fa fa-star"></i>
								</div>
								<div class="card-attr card-attr1">{{ $i }} PAC</div>
								<div class="card-attr card-attr2">{{ $i }} SHO</div>
								<div class="card-attr card-attr3">{{ $i }} PAS</div>
								<div class="card-attr card-attr4">{{ $i }} DRI</div>
								<div class="card-attr card-attr5">{{ $i }} DEF</div>
								<div class="card-attr card-attr6">{{ $i }} HEA</div>
							</div>
							<div class="card-price text-center">
								<img src="http://www.futhead.com/static/img/coin.png?7d6bfc9c1301" alt=""> 1{{ $i }}
							</div>
						</a>
					</li>
					@endfor
				</ul>
				<div class="row ul-0">
					<div class="large-5 columns">
						<ul class="pagination">
							<li class="arrow unavailable"><a href="">&laquo;</a></li>
							<li class="current"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">4</a></li>
							<li class="unavailable"><a href="">&hellip;</a></li>
							<li><a href="">12</a></li>
							<li><a href="">13</a></li>
							<li class="arrow"><a href="">&raquo;</a></li>
						</ul>
					</div>
					<div class="large-5 large-offset-2 columns">
						<dl class="sub-nav right">
							<dt>Filter:</dt>
							<dd class="active"><a href="#">All</a></dd>
							<dd><a href="#">Active</a></dd>
							<dd><a href="#">Pending</a></dd>
							<dd><a href="#">Suspended</a></dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
