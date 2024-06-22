@extends('master')

@section('title', 'Games Page')


@section('content')
    <div class="container mx-auto py-10 px-5 md:px-32">
        <div class="lg:grid lg:grid-cols-2 lg:gap-20">
            <div class="lg:grid lg:grid-cols-1 place-items-end">
                <div>
                    <img src="{{ asset("images/games_images/minesweeperImage.jpg") }}" alt="" width="300" class="rounded mx-auto md:mx-0">
                    <div class="grid grid-cols-3 place-items-center gap-3 py-3 text-white">
                        <button class="bg-green-500 px-5 py-1 rounded">{{__('customLang.Easy')}}</button>
                        <button class="bg-yellow-500  px-5 py-1 rounded">{{ __('customLang.Normal') }}</button>
                        <button class="bg-red-500  px-5 py-1 rounded">{{ __('customLang.Hard') }}</button>
                    </div>
                </div>

            </div>
            <div class="lg:grid lg:grid-cols-1 place-items-start">
                <div>
                    <img src="{{ asset("images/games_images/sudokuImage.png") }}" alt="" width="300" class="rounded mx-auto md:mx-0">
                    <div class="grid grid-cols-3 place-items-center gap-3 py-3 text-white">
                        <button class="bg-green-500 px-5 py-1 rounded">{{__('customLang.Easy')}}</button>
                        <button class="bg-yellow-500  px-5 py-1 rounded">{{ __('customLang.Normal') }}</button>
                        <button class="bg-red-500  px-5 py-1 rounded">{{ __('customLang.Hard') }}</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
