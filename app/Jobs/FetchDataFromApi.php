<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Interfaces\IOpenWeatherMapClient;
use App\Interfaces\IWeatherRepository;
use App\Interfaces\ICityRepository;
use Illuminate\Support\Facades\Log;

class FetchDataFromApi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(IOpenWeatherMapClient $client,
                           IWeatherRepository $weatherRepository,
                           ICityRepository $cityRepository)
    {
        Log::alert('alert 1');
        try {
			$cities = $cityRepository->getAll();

			foreach ($cities as $city) {
                $data = $client->findCityById($city->city_id);
                $weatherRepository->updateInformation($data);
                Log::alert('alert 2');
			}
		}
		catch(Exception $e) {

		}
    }
}