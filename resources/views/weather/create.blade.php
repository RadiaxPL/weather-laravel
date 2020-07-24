@extends('weather.layouts.master')

@section('content')
    <div class="container pt-4 text-center">
        <img src="/city.png" height="128" width="128" alt="Statystyki pogody">
        <h1 class="text-center mt-4">Dodaj nowe miasto do monitorowania.</h1>

        <div class="col-md-4 mx-auto mt-4">
            <form method="post" action="{{ route('city-add') }}">
                @csrf

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="form-group">
                    <label for="exampleInputCity">Wpisz nazwę miasta</label>
                    <input type="text" name="city" class="form-control" id="exampleInputCity" required>
                    <small id="cityHelp" class="form-text text-muted">Nazwa miasta może zawierać polskie znaki</small>
                </div>
                <button type="submit" class="btn btn-danger mt-4">Dodaj nowe miasto</button>
            </form>
        </div>

    </div>
@endsection
