<!-- user/profile.blade.php -->
@extends('master')

@section('content')


<div class="container mx-auto px-4 md:px-32 py-10">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-1 pb-10">

        <div class="col-span-1" style="background-image: url('{{ asset('images/profile-images/' . $user->profile_image) }}');
                                                        background-repeat: no-repeat;
                                                        background-position: center;
                                                        background-size: cover;
                                                        height: 200px;
                                                        width: 200px;
                                                        border-radius: 10%;"></div>

        <div class="col-span-2 pt-4">
            <h1 class="text-start text-2xl text-white">{{ $user->username }}</h1>
            <p class="text-justify text-white text-base pt-3 pb-10">{{ $user->bio }}</p>
            <a href="{{ route("edit.profile", $user->id) }}">
                <button class="lebify-btn-v4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20" fill="none"
                    class="svg-icon">
                    <g stroke-width="1.5" stroke-linecap="round" stroke="#0EA5E9">
                        <circle r="2.5" cy="10" cx="10"></circle>
                        <path fill-rule="evenodd"
                            d="m8.39079 2.80235c.53842-1.51424 2.67991-1.51424 3.21831-.00001.3392.95358 1.4284 1.40477 2.3425.97027 1.4514-.68995 2.9657.82427 2.2758 2.27575-.4345.91407.0166 2.00334.9702 2.34248 1.5143.53842 1.5143 2.67996 0 3.21836-.9536.3391-1.4047 1.4284-.9702 2.3425.6899 1.4514-.8244 2.9656-2.2758 2.2757-.9141-.4345-2.0033.0167-2.3425.9703-.5384 1.5142-2.67989 1.5142-3.21831 0-.33914-.9536-1.4284-1.4048-2.34247-.9703-1.45148.6899-2.96571-.8243-2.27575-2.2757.43449-.9141-.01669-2.0034-.97028-2.3425-1.51422-.5384-1.51422-2.67994.00001-3.21836.95358-.33914 1.40476-1.42841.97027-2.34248-.68996-1.45148.82427-2.9657 2.27575-2.27575.91407.4345 2.00333-.01669 2.34247-.97026z"
                            clip-rule="evenodd"></path>
                    </g>
                </svg>
                <span class="lable">{{ __("customLang.Edit profile") }}</span>
                </button>
            </a>
        </div>
        <div class="col-span-1">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="Btn" type="submit">

                    <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>

                    <div class="text">{{ __("customLang.logout") }}</div>
                  </button>
            </form>
        </div>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-2">
        @foreach($scores->groupBy('game.game_name') as $gameName => $gameScores)

        <div class="pb-8">
            <h2 class="text-center text-2xl text-sky-500">{{ __('customlang.'.$gameName) }}</h2>
            <canvas id="{{ Str::slug($gameName) }}Chart" width="1000" height="600"></canvas>
        </div>

        <script>
            var ctx = document.getElementById('{{ Str::slug($gameName) }}Chart').getContext('2d');

            // Change the format of the dates
            @php
                $dates = $gameScores->pluck('date_played')->map(function ($date) {
                return \Carbon\Carbon::parse($date)->format('Y-m-d');
                })->toArray();
            @endphp

            var dates = @json($dates);
            var scores = @json($gameScores -> pluck('score') -> toArray());

            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: '{{ __("customlang.Scores") }}',
                        data: scores,
                        backgroundColor: 'white',
                        borderColor: 'rgb(30, 113, 223)',
                        borderWidth: 2,
                        pointStyle: 'circle',
                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            type: 'time',
                            time: {
                                unit: 'day'
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    plugins: {
                        legend: {
                            labels: {
                                // This more specific font property overrides the global property
                                font: {
                                    size: 25
                                },
                                boxWidth: 10,
                                boxHeight: 10,
                            }
                        }
                    },

                }
            });

        </script>


    @endforeach
    </div>

</div>
@endsection
