@extends('master')

@section('title', 'Games Page')


@section('content')
    <div class="container mx-auto py-10 px-5 md:px-32">
        <div class="lg:grid lg:grid-cols-2 lg:gap-20">
            <div class="lg:grid lg:grid-cols-1 place-items-end">
                <div>
                    <img src="{{ asset("images/games_images/minesweeperImage.jpg") }}" alt="" width="300" class="rounded mx-auto md:mx-0">
                    <div class="grid grid-cols-3 place-items-center gap-3 py-3 text-white">
                        <button class="bg-green-500 px-5 py-1 rounded"><a href="http://127.0.0.1:5000/Minesweeper/{{Auth::user()->id}}/19">{{__('customLang.Easy')}}</a></button>
                        <button class="bg-yellow-500  px-5 py-1 rounded"><a href="http://127.0.0.1:5000/Minesweeper/{{Auth::user()->id}}/27">{{ __('customLang.Normal') }}</a></button>
                        <button class="bg-red-500  px-5 py-1 rounded"><a href="http://127.0.0.1:5000/Minesweeper/{{Auth::user()->id}}/40">{{ __('customLang.Hard') }}</a></button>
                    </div>
                </div> 

            </div>
            <div class="lg:grid lg:grid-cols-1 place-items-start">
                <div>
                    <img src="{{ asset("images/games_images/sudokuImage.png") }}" alt="" width="300" class="rounded mx-auto md:mx-0">
                    <div class="grid grid-cols-3 place-items-center gap-3 py-3 text-white">
                        <button class="bg-green-500 px-5 py-1 rounded"><a href="http://127.0.0.1:5000/Sudoku/{{Auth::user()->id}}/easy">{{__('customLang.Easy')}}</a></button>
                        <button class="bg-yellow-500  px-5 py-1 rounded"><a href="http://127.0.0.1:5000/Sudoku/{{Auth::user()->id}}/normal">{{ __('customLang.Normal') }}</a></button>
                        <button class="bg-red-500  px-5 py-1 rounded"><a href="http://127.0.0.1:5000/Sudoku/{{Auth::user()->id}}/hard">{{ __('customLang.Hard') }}</a></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
