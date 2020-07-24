@extends('weather.layouts.master')

@section('content')
    <div class="container pt-4 text-center">
        <img src="/cloud.png" height="128" width="128" alt="Statystyki pogody">
        <h1 class="mt-4">Monitoring temperatury miast!</h1>

        <p class="mt-4 font-italic">
            Statystyki dotyczące temperatury wybranych miast, dostępne za pośrednictwem <a href="https://openweathermap.org/">OpenWeather API</a>
        </p>

        <div class="row d-flex justify-content-center">

            @forelse($cities as $city)
                <div class="col-md-4 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $city->name }}</h5>
                            <div>Temperatura {{ $city->lastActivity['temperature'] }} &#8451;</div>
                            <div>Wilgotność: {{ $city->lastActivity['humidity'] }} %</div>
                            <div>Ciśnienie: {{ $city->lastActivity['pressure'] }} hPa</div>
                            <hr>
                            <p>
                                <a href="{{ route('show_by_id', ['id' => $city->id]) }}" class="btn btn-sm btn-info">Pokaż statystyki miasta</a>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">
                    Dodaj jakieś miasto!
                </div>
            @endforelse

        </div>
    </div>
@endsection
