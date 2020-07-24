@extends('weather.layouts.master')

@section('content')
    <div class="container pt-4 text-center">
        <img src="/edit.png" height="128" width="128" alt="Statystyki dotyczące miast">
        <h1 class="mt-4">Edytuj miasta</h1>

        <table class="table mt-4 table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Miasto</th>
                <th scope="col">Działanie</th>
            </tr>
            </thead>
            <tbody>
            @forelse($cities as $city)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $city->name }}</td>
                    <td>
                        <a href="{{ route('delete-city', ['id' => $city->id]) }}" class="btn btn-danger btn-sm">Usuń</a>
                    </td>
                </tr>
            @empty
                <div class="alert alert-danger">
                    Brak miast w bazie danych!
                </div>
            @endforelse

            </tbody>
        </table>

    </div>
@endsection
