@extends('weather.layouts.master')

@section('content')
    <div class="container p-4 text-center">
        <img src="/statistic.png" height="128" width="128" alt="Statystyki pogody">
        <h1 class="mt-4">Statystyki miasta {{ $city->name }} </h1>

        <div class="row d-flex justify-content-center">

            <table class="table mt-4">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Temperatura</th>
                    <th scope="col">Wilgotność</th>
                    <th scope="col">Ciśnienie</th>
                    <th scope="col">Data</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($city->statistic as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->temperature }}</td>
                            <td>{{ $data->humidity }}</td>
                            <td>{{ $data->pressure }}</td>
                            <td>{{ $data->created_at }}</td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">
                            Brak danych historycznych!
                        </div>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection
