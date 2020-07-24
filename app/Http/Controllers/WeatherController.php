<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\IWeatherRepository;
use App\Interfaces\IWeatherService;

class WeatherController extends Controller
{
    private $weatherService;
    private $weatherRepository;

    public function __construct(IWeatherService $weatherService, IWeatherRepository $weatherRepository)
    {
        $this->weatherService = $weatherService;
        $this->weatherRepository = $weatherRepository;
    }

    public function index()
    {
        $data = $this->weatherRepository->getAll();

        return view('weather.index', ["cities" => $data]);
    }

    public function create()
    {
        return view('weather.create');
    }

    public function store(Request $request)
    {
        $city = $request->input('city');

        $validatedData = $request->validate([
            'city' => 'required|max:100',
        ]);

        $response = $this->weatherService->add($city);

        if ($response == false) {
            return redirect()->route('add')->with('error', 'Brak podanego miasta w bazie!');
        } else {
            return redirect()->route('add')->with('success', 'Dodano nowe miasto - ' . $response);
        }
    }

    public function show($id)
    {
        $data = $this->weatherRepository->get($id);

        return view('weather.show', ["city" => $data]);
    }

    public function edit()
    {
        $data = $this->weatherRepository->getAll();

        return view('weather.edit', ["cities" => $data]);
    }

    public function destroy($id)
    {
        $this->weatherRepository->destroy($id);

        return redirect()->route('edit');
    }
}
