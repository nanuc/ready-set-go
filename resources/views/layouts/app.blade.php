@extends('rsg::layouts.base')

@section('body')
    @yield('content')

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    @include('rsg::modules.notification')
@endsection
