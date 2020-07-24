@extends('weather.layouts.master')

@section('content')
    <div class="container p-4 text-center">
        <img src="/statistic.png" height="128" width="128" alt="Statystyki pogody">
        <h1 class="mt-4">Statystyki miast</h1>

        <div class="row d-flex justify-content-center">
            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $city->name }}</h5>
                        <hr>
                        <p>
                            <a href="#" class="btn btn-sm btn-warning">Edytuj miasto</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
