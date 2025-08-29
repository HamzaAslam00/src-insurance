<?php

namespace App\Services;

use GuzzleHttp\Client;

class YelpService
{
    protected $client;
    protected $apiKey;

    public function __construct(Client $client, $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    public function searchBusinesses($term, $location)
    {
        $url = "https://api.yelp.com/v3/businesses/search";
        $response = $this->client->request('GET', $url, [

            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
            ],
            'query' => [
                'term' => $term,
                'location' => $location,
            ],
        ]);

        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody()->getContents(), true);
        } else {
            return response()->json(['error' => 'Error fetching data from Yelp API'], $response->getStatusCode());
        }
    }
}
