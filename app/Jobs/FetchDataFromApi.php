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

class FetchDataFromApi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	private $client;
	private $weatherRepository;
	private $cityRepository;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(IOpenWeatherMapClient $client,
                                IWeatherRepository $weatherRepository,
                                ICityRepository $cityRepository
    )
    {
        $this->client = $client;
        $this->weatherRepository = $weatherRepository;
        $this->cityRepository = $cityRepository;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
			$cities = $this->cityRepository->getAll();

			foreach ($cities as $city) {
                $data = $this->client->findCityById($city->city_id);
                $this->weatherRepository->updateInformation($data);
			}
		}
		catch(Exception $e) {

		}
    }
}
