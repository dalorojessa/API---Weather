<?php

// Define the namespace for this service class to organize the code
namespace App\Services;

// Import the GuzzleHttp Client class for making HTTP requests
use GuzzleHttp\Client;

// Define the WeatherService class that will handle fetching weather data
class WeatherService
{
    // Declare a protected property to hold an instance of the Guzzle HTTP client
    protected $client;
    // Declare a protected property to hold the API key for the RapidAPI service
    protected $apiKey;
    // Declare a protected property to hold the host URL for the weather API
    protected $host;

    // Define the constructor for the WeatherService class
    public function __construct()
    {
        // Initialize the Guzzle HTTP client
        $this->client = new Client();
        // Retrieve the RapidAPI key from the env
        $this->apiKey = env('RAPIDAPI_KEY');
        // Set the host URL for the weather API
        $this->host = 'open-weather13.p.rapidapi.com';
    }

    // Define a method that fetches the weather data for a given city
    public function getWeather($city)
    {
        // Send an HTTP GET request to the weather API using the Guzzle client
        $response = $this->client->request('GET', "https://{$this->host}/city/{$city}/EN", [
            'headers' => [
                // Set API host header
                'X-RapidAPI-Host' => $this->host,
                // Set API key header
                'X-RapidAPI-Key' => $this->apiKey,
            ],
        ]);

        // Decode JSON response and return as array
        return json_decode($response->getBody()->getContents(), true);
    }
}
