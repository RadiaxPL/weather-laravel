<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logowanie - {{ env('APP_NAME') }}</title>

    <!-- CSS, JavaScript -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/weather.css"/>

</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Moduł WeatherAPI</a>

    @guest
        <div class="text-light float-right">
            Zaloguj się!
        </div>
    @endguest
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">E-mail</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Wpisz swój e-mail">
                    @error('email')
                        <small class="text-danger">Podaj adres e-mail!</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Hasło</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Wpisz swoje hasło">
                    @error('password')
                        <small class="text-danger">Podaj hasło!</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Zaloguj</button>
                @error('email')
                <div class="alert alert-danger mt-4">
                    Brak użytkownika w bazie!
                </div>
                @enderror
            </form>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>
