<?php

// Define the namespace for this controller class to organize the code
namespace App\Http\Controllers;

// Import the WeatherService 
use App\Services\WeatherService;
// Import the base controller class
use Laravel\Lumen\Routing\Controller as BaseController;

// Define the WeatherController class that extends the BaseController class
class WeatherController extends BaseController
{
    // Define a protected property to hold an instance of weatherService
    protected $weatherService;

    // Define the constructor from the WeatherService class
    public function __construct(WeatherService $weatherService)
    {
        // Assign the received weatherService instance to the protected property
        $this->weatherService = $weatherService;
    }

    // Define a method that will handle HTTP requests to show weather information for a given city
    public function show($city)
    {
        // Call the getWeather method of the weatherService instance , passing the city name to retrieve the weather data
        $weather = $this->weatherService->getWeather($city);
        // Return the weather data as a JSON
        return response()->json($weather);
    }
}
