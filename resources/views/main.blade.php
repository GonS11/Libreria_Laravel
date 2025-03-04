@extends('layouts.app')

@section('content')
    @guest
        @section('title', 'You need to logged in to ')
    @endguest

    @auth()
        @include('layouts._partials.messages')
        @include('layouts._partials.main_page')
    @endauth

@endsection
