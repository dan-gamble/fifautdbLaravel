@extends('layout.master')

@section('before-content')
    @parent
    <div class="row">
    	<div class="col-lg-12">
    		<div class="main-content">

    			@yield('left-9')

    		</div>
    		<aside>

    			@yield('right-3')

    		</aside>

    	</div>
    </div>
@stop
