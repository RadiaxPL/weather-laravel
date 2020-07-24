<?php

namespace App\Http\Controllers;

use App\Interfaces\ICityRepository;
use Illuminate\Http\Request;
use App\Interfaces\ICityRepositoryRepository;
use App\Interfaces\ICityService;

class WeatherController extends Controller
{
    private $cityService;
    private $cityRepository;

    public function __construct(ICityService $cityService, ICityRepository $cityRepository)
    {
        $this->middleware('auth');

        $this->cityService = $cityService;
        $this->cityRepository = $cityRepository;
    }

    public function index()
    {
        $data = $this->cityRepository->getAll();

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

        $response = $this->cityService->add($city);

        if ($response == false) {
            return redirect()->route('add')->with('error', 'Brak podanego miasta w bazie!');
        } else {
            return redirect()->route('add')->with('success', 'Dodano nowe miasto - ' . $response['name']);
        }
    }

    public function show($id)
    {
        $data = $this->cityRepository->get($id);

        return view('weather.show', ["city" => $data]);
    }

    public function edit()
    {
        $data = $this->cityRepository->getAll();

        return view('weather.edit', ["cities" => $data]);
    }

    public function destroy($id)
    {
        $this->cityRepository->destroy($id);

        return redirect()->route('edit');
    }
}
