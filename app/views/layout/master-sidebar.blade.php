@extends('layout.master')

@section('before-content')
    @parent
    <div class="row">
        <div class="large-9 columns">

            @yield('left-9')

        </div>
        <div class="large-3 columns">

            @yield('right-3')

        </div>
    </div>
@stop