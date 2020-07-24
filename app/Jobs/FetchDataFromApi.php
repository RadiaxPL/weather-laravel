<?php

namespace App\Jobs;


use App\Interfaces\Services\IWeatherService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Interfaces\Repositories\ICityRepository;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

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
    public function handle(IWeatherService $weatherService, ICityRepository $cityRepository)
    {
        $cities = $cityRepository->getAll();
        $count = 0;

        foreach ($cities as $city) {
            try {
                $weatherService->addCurrentWeatherForCity($city);
                $count++;
            }
            catch (Exception $e) {
                Log::error($e->getMessage());
            }
        }

        Log::alert('Pobrano nowe dane z API w ilośći '. $count);
    }
}
