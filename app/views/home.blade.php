@extends('layout.master')

@section('content')
<div class="row">
	<div class="large-12 columns">
        <h3>h3. Bootstrap heading</h3>
        <hr>
        <p>{{ Auth::check() ? "Welcome, " . Auth::user()->username : "Why don't you sign up?" }}</p>
        {{Form::open(array('url'=>'/'))}}
        <div class="search-input">
            <i class="fa fa-search fa-2x"></i>
            {{Form::text('keyword', null, array('placeholder'=>'search by keyword', 'class' => 'class'))}}
        </div>
        {{Form::close()}}
        @if (Request::isMethod('post'))
            <ul class="large-block-grid-8">
            @foreach ($playerBack as $player)
                <li>
                    <a href="{{ $player->url_str() }}">@include('layout.card-14')</a>
                </li>
            @endforeach
        @endif
	</div>
</div>
@stop
