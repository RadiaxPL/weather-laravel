<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Entities\City;
use App\Interfaces\IOpenWeatherMapClient;

class FetchDataFromApi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
	
	private client;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(IOpenWeatherMapClient $client)
    {
        $this->client = $client;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
			$cities = City::all(); 
			
			foreach ($cities as $city) {
				
			}
		}
		catch(Exception $e) {
			
		}
    }
}
