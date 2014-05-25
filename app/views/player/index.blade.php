@extends('layout.master')

@section('page-heading')
{{ $player->common_name }}
@stop

@section('content')
<div class="row">
	<div class="col-lg-7 columns">
        <div class="row">
            <div class="col-lg-4 columns">
                <h4>{{ $player->common_name }}</h4>
                <hr>
                @include('layout.card-14')
            </div>
            <div class="col-lg-8 columns">
                <h4>Skill Stats</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_profile('Ball Control') }}
                            {{ $player->attr_profile('Curve') }}
                            {{ $player->attr_profile('Finishing') }}
                            {{ $player->attr_profile('Heading Accuracy') }}
                            {{ $player->attr_profile('Long Shots') }}
                            {{ $player->attr_profile('Penalties') }}
                            {{ $player->attr_profile('Shot Power') }}
                            {{ $player->attr_profile('Standing Tackle') }}
                        </ul>
                    </div>
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_profile('Crossing') }}
                            {{ $player->attr_profile('Dribbling') }}
                            {{ $player->attr_profile('Free Kick Accuracy') }}
                            {{ $player->attr_profile('Long Passing') }}
                            {{ $player->attr_profile('Marking') }}
                            {{ $player->attr_profile('Short Passing') }}
                            {{ $player->attr_profile('Sliding Tackle') }}
                            {{ $player->attr_profile('Volleys') }}
                        </ul>
                    </div>
                </div>
                <h4>Mental Stats</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_profile('Aggression') }}
                            {{ $player->attr_profile('Interceptions') }}
                        </ul>
                    </div>
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_profile('Positioning') }}
                            {{ $player->attr_profile('Vision') }}
                        </ul>
                    </div>
                </div>
                <h4>Physical Stats</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_profile('Acceleration') }}
                            {{ $player->attr_profile('Balance') }}
                            {{ $player->attr_profile('Reactions') }}
                            {{ $player->attr_profile('Strength') }}
                        </ul>
                    </div>
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_profile('Agility') }}
                            {{ $player->attr_profile('Jumping') }}
                            {{ $player->attr_profile('Sprint Speed') }}
                            {{ $player->attr_profile('Stamina') }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<div class="col-lg-5 columns">
        <h4>{{ $player->common_name }} Stats</h4>
        <hr>
        <table class="table table-striped">
            <tr>
                <td>Skill Moves</td>
                <td>
                    @for ($i = 1; $i <= $player->skill_moves; $i++)
                    <i class="fa fa-star"></i>
                    @endfor
                    @for ($i = $player->skill_moves; $i != 5; $i++)
                    <i class="fa fa-star-o"></i>
                    @endfor
                </td>
            </tr>
            <tr>
                <td>Weak Foot</td>
                <td>
                    @for ($i = 1; $i <= $player->weak_foot; $i++)
                    <i class="fa fa-star"></i>
                    @endfor
                    @for ($i = $player->weak_foot; $i != 5; $i++)
                    <i class="fa fa-star-o"></i>
                    @endfor
                </td>
            </tr>
            <tr>
                <td>Club</td>
                <td><a href="{{ $player->club->url_str() }}">{{ $player->club->club_name }}</a></td>
            </tr>
            <tr>
                <td>League</td>
                <td><a href="{{ $player->league->url_str() }}">{{ $player->league->league_name_abbr15 }}</a></td>
            </tr>
            <tr>
                <td>Nationality</td>
                <td><a href="{{ $player->nation->url_str() }}">{{ $player->nation->nation_name }}</a></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td>{{ date('jS M Y', strtotime($player->dob)) }}</td>
            </tr>
            <tr>
                <td>Joined Club</td>
                <td>{{ date('jS M Y', strtotime($player->join_date)) }}</td>
            </tr>
            <tr>
                <td>Height</td>
                <td>{{ $player->height }}cm</td>
            </tr>
            <tr>
                <td>Weight</td>
                <td>{{ $player->weight }}kg</td>
            </tr>
            <tr>
                <td>Pref. Foot</td>
                <td>{{ $player->pref_foot() }}</td>
            </tr>
            <tr>
                <td>Att. Workrate</td>
                <td>{{ $player->att_workrate() }}</td>
            </tr>
            <tr>
                <td>Def. Workrate</td>
                <td>{{ $player->def_workrate() }}</td>
            </tr>
            <tr>
                <td>Added</td>
                <td>{{ date('jS M Y - g:i A', strtotime($player->created_at)) }}</td>
            </tr>
            <tr>
                <td>Updated</td>
                <td>{{ date('jS M Y - g:i A', strtotime($player->created_at)) }}</td>
            </tr>
        </table>
	</div>
</div>
<div class="row">
    <div class="col-lg-12 mt-10 columns">
        <div class="row">
            <div class="col-lg-6 columns">
                <h4>Comments</h4>
                @if (Auth::guest())
                <p>Please <a href="/login">Log in</a> to comment</p>
                @else
                {{ Form::open(['route' => array('player.commentStore', $player->id)]) }}
                {{ Form::textarea('comment', null, ['required' => 'required']) }}
                {{ $errors->first('comment', '<small class="error">:message</small>') }}

                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace( 'comment' );
                </script>

                {{ Form::submit('Post Comment', ['class' => 'small button' ]) }}
                {{ Form::close() }}
                @endif
            </div>
        </div>
        @foreach ($comments as $comment)
        <article class="row">
            <section class="author-info col-lg-2 columns text-center">
                <h5><a href="#">{{ $comment->user->username }}</a></h5>
                <img src="http://placehold.it/100x100" alt="">
                <p>Site Admin</p>
                <p>123 comments</p>
                <p><strong>47.2</strong> Points Ratio</p>
            </section>
            <section class="comment-body col-lg-10 columns">
                <header class="clearfix">
                    <section class="left">[ <strong>-</strong> ]</section>
                    <section class="right">Posted {{ $comment->dateTime() }}</section>
                </header>
                <hr class="dashed">
                <section>
                    <p>{{ $comment->comment }}</p>
                </section>
                <hr class="dashed">
                <footer class="clearfix">
                    <ul class="inline-list right">
                        <li><a href="#">Reply</a></li>
                        <li><a href="#">Quote</a></li>
                        <li><a href="#">Edit</a></li>
                        <li><a href="#">Delete</a></li>
                        <li><a href="#">Report</a></li>
                    </ul>
                </footer>
            </section>
        </article>
        <article class="row comment-child">
            <section class="author-info col-lg-2 columns text-center">
                <h1>{{ $comment->comment_parent_id }}</h1>
                <h5><a href="#">{{ $comment->user->username }} </a></h5>
                <img src="http://placehold.it/100x100" alt="">
                <p>Site Admin</p>
                <p>123 comments</p>
                <p><strong>47.2</strong> Points Ratio</p>
            </section>
            <section class="comment-body col-lg-10 columns">
                <header class="clearfix">
                    <section class="left">[ <strong>-</strong> ]</section>
                    <section class="right">Posted {{ $comment->dateTime() }}</section>
                </header>
                <hr class="dashed">
                <section>
                    <p>
                    <blockquote>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        <cite>
                            <a href="#">{{ $comment->user->username }} at {{ $comment->dateTime() }}</a>
                        </cite>
                    </blockquote>
                    </p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </section>
                <hr class="dashed">
                <footer class="clearfix">
                    <ul class="inline-list right">
                        <li><a href="#">Reply</a></li>
                        <li><a href="#">Quote</a></li>
                        <li><a href="#">Edit</a></li>
                        <li><a href="#">Delete</a></li>
                        <li><a href="#">Report</a></li>
                    </ul>
                </footer>
            </section>
        </article>
        <article class="row comment-child">
            <div class="clearfix">
                <section class="author-info col-lg-2 columns text-center">
                    <a href="#">{{ $comment->user->username }}</a>
                </section>
                <section class="comment-body col-lg-10 columns">
                    <header class="clearfix">
                        <section class="left">[ <strong>+</strong> ]</section>
                        <section class="right">Posted {{ $comment->dateTime() }}</section>
                    </header>
                </section>
            </div>

            <hr class="dashed">
        </article>
        @endforeach
    </div>
</div>
@stop
