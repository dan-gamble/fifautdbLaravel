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
	</div>
</div>
@stop
