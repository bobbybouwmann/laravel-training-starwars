<?php

namespace App\Services;

use App\Http\Clients\StarWarsClient;
use App\Transformers\PlanetTransformer;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Collection;

class StarWarsService
{
    private $client;

    public function __construct(StarWarsClient $client)
    {
        $this->client = $client;
    }

    public function getPlanets(): Collection
    {
        $items = $this->doRequest('planets', 'get');

        return (new PlanetTransformer())->toCollection($items['results']);
    }

    private function doRequest(string $url, string $method = 'get', array $data = [])
    {
        try {
            $response = $this->client->request($method, $url);

            return json_decode((string) $response->getBody(), true);
        } catch (RequestException $exception) {
            dd('RequestException: ' . $exception->getMessage());
        } catch (GuzzleException $exception) {
            dd('GuzzleException: ' . $exception->getMessage());
        }
    }
}
