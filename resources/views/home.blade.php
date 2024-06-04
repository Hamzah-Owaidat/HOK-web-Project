@extends('master')
@section('title', 'Home Page')


@section('content')

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">{{ __('customLang.logout') }}</button>
</form>

@endsection



