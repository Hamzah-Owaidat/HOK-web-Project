@extends('master')

@section('title', 'Profile Page')

@section('content')
    <div>
        <canvas id="myChart"></canvas>
    </div>
    
@endsection

@section('scripts')
    <script src="{{ asset('js/chart.js') }}"></script>
@endsection
