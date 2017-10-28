@extends('layouts.blank2')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
<div class="row">
    <br/>
    <br/>
    <br/>
    <h2 align="center">Test Nancy Karen Martinez Galaviz</h2>
    <div class="col-md-offset-1 col-md-10">
        @yield('containercol')
    </div>
</div>
    <!-- /page content -->
@endsection