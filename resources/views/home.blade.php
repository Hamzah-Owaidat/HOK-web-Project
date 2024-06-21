@extends('master')
@section('title', 'Home Page')


@section('content')
{{-- <p>{{ $usersPerMonth  }}</p> --}}
    <div class="container mx-auto px-5 md:px-32">

        <div class="py-4 lg:grid lg:grid-cols-2 lg:gap-12 lg:py-10 border-b border-white">
            <div class="flex flex-col justify-center  text-white">
                <h1 class="text-3xl md:text-4xl pb-8">{{ __("customLang.Welcome To HOK") }}!</h1>
                <h4 class="text-lg md:text-xl pb-5 text-sky-500">{{ __("customLang.Your ultimate destination for fun and challenging games.") }}</h4>
                <p class="text-sm md:text-lg text-justify">{{ __("customLang.game_description") }}</p>
            </div>

            <div class="flex justify-center items-center">
                <img src="{{ asset("images/Sudoku-bro.png") }}" alt="" height="300" class="hidden lg:block">
            </div>
        </div>

        <div class="py-7 border-b border-white">
            <h1 class="text-white text-center text-4xl pb-3">{{ __("customLang.Popular activity") }}</h1>
            <canvas id="popularActivity"></canvas>
        </div>

        <div class="py-6">
            <h1 class="text-white text-4xl text-center pb-5">{{ __("customLang.Our Games") }}</h1>

            <div class="md:flex md:justify-center md:items-center md:gap-10 lg:gap-40 md:py-10" id="minesweeperSection">

                <img src="{{ asset("images/games_images/minesweeperImage.jpg") }}" alt="" width="300" class="rounded mx-auto md:mx-0">


                    <div class="text-white py-3 md:py-0 text-center md:text-justify">
                        <h4 class="text-3xl text-sky-500">{{ __("customLang.Minesweeper") }}</h4>
                        <p class="md:w-80 py-3" id="minesweeperText"></p>
                    </div>

            </div>

            <div class="md:flex md:justify-center md:items-center md:gap-10 lg:gap-40 md:py-10" id="sudokuSection">

                <div class="text-white py-3 md:py-0 text-center md:text-justify">
                    <h4 class="text-3xl text-sky-500">{{ __("customLang.Sudoku") }}</h4>
                    <p class="md:w-80 py-3" id="sudokuText"></p>
                </div>

                <img src="{{ asset("images/games_images/sudokuImage.png") }}" alt="" width="300" class="rounded mx-auto md:mx-0">
            </div>
        </div>

    </div>

@endsection

@section('scripts')
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>
    // Minesweeper typed animation
    console.log("{{ __('customLang.Minesweeper details') }}")
    console.log("{{ __('customLang.Sudoku details') }}")
    const minesweeperAnimatedElement = document.querySelector('#minesweeperSection');
    const minesweeperTyped = new Typed('#minesweeperText', {
        strings: ["{{ __('customLang.Minesweeper_details') }}"],
        typeSpeed: 50,
        showCursor: false,
    });

    // Sudoku typed animation
    const sudokuAnimatedElement = document.querySelector('#sudokuSection');
    const sudokuTyped = new Typed('#sudokuText', {
        strings: ["{{ __('customLang.Sudoku_details') }}"],
        typeSpeed: 50,
        showCursor: false,
    });

    // Create a single IntersectionObserver instance
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.target === minesweeperAnimatedElement) {
                if (entry.isIntersecting) {
                    minesweeperTyped.start();
                } else {
                    minesweeperTyped.stop();
                }
            } else if (entry.target === sudokuAnimatedElement) {
                if (entry.isIntersecting) {
                    sudokuTyped.start();
                } else {
                    sudokuTyped.stop();
                }
            }
        });
    }, {
        rootMargin: '0px 0px -50px 0px',
    });

    // Observe both animated elements
    observer.observe(minesweeperAnimatedElement);
    observer.observe(sudokuAnimatedElement);
</script>


<script>
    const ctx = document.getElementById('popularActivity').getContext('2d');;
    const usersPerMonth = @json($usersPerMonth);

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [
                    "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ],

        datasets: [{
          label: 'Nb of Users',
          data: usersPerMonth,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
</script>

@endsection


