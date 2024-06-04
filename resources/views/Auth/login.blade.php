@extends('Auth.auth-master')
@section('title', 'Login Page')
@section('content')
    @if (session()->has('success'))
        <p class="text-green-500">{{ session()->get('success') }}</p>
    @endif
    @if (session()->has('error'))
        <p class="text-red-500">{{ session()->get('error') }}</p>
    @endif
    <div class="bg-white dark:bg-gray-900">
        <div class="flex justify-center h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: url({{ asset('images/HOK.png') }})">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                    <div>
                        <h2 class="text-2xl font-bold text-white sm:text-3xl">{{ __('customLang.Welcome To HOK') }}</h2>
                        <p class="max-w-xl mt-3 text-gray-300">{{ __('customLang.Sign in to start your adventure with us') }}</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="relative inline-block text-left w-full mb-4">
                        <div x-data="{ open: false }">
                            <button @click="open = !open" class="w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 rounded inline-flex justify-between items-center dark:bg-[#20293A] dark:border-slate-700 dark:text-gray-400">
                                <span>{{ __('customLang.language') }}</span>
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false" class="absolute z-50 mt-2 w-full rounded-md shadow-lg bg-white border border-gray-200 dark:bg-[#20293A] dark:border-slate-700" x-cloak>
                                <div class="py-1 text-gray-700 dark:text-gray-400 text-sm" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                    <a href="{{ route('webLang', 'en') }}" class="block px-4 py-2  hover:bg-gray-100 dark:hover:bg-[#161d2a]" role="menuitem">{{ __('customLang.english') }}</a>
                                    <a href="{{ route('webLang', 'ar') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-[#161d2a]" role="menuitem">{{ __('customLang.arabic') }}</a>
                                    <a href="{{ route('webLang', 'fr') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-[#161d2a]" role="menuitem">{{ __('customLang.french') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="mt-3 text-gray-500 dark:text-gray-300 text-xl">{{ __('customLang.Sign in to access your account') }}</p>
                    </div>
                    <div class="mt-8">
                        <form action="{{ route('login_post') }}" method="POST">
                            @csrf
                            {{-- Email --}}
                            <div class="mb-4">
                                <label for="email" class="block text-sm text-gray-600 dark:text-gray-200">{{ __('customLang.email') }}</label>
                                <input type="email" name="email" id="email" placeholder="example@example.com" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                @error('email')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- Password --}}
                            <div class="mt-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password" class="text-sm text-gray-600 dark:text-gray-200">{{ __('customLang.password') }}</label>
                                </div>
                                <input type="password" name="password" id="password" placeholder="Your Password" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                @error('password')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-6">
                                <button class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50" name="submit">
                                    {{ __('customLang.sign in') }}
                                </button>
                            </div>
                        </form>
                        <p class="mt-6 text-sm text-center text-gray-400">{{ __('customLang.Don\'t have an account yet?') }} <a href="{{ route('register_view') }}" class="text-blue-500 focus:outline-none focus:underline hover:underline">{{ __('customLang.signup') }}</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
