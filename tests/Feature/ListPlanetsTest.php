<?php

namespace Tests\Feature;

use App\User;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Support\WorksWithStarWars;
use Tests\TestCase;

class ListPlanetsTest extends TestCase
{
    use DatabaseTransactions, WorksWithStarWars;

    /**
     * @var MockHandler
     */
    private $starWarsMockHandler;

    /**
     * @var User
     */
    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->starWarsMockHandler = $this->mockStarWars();

        $this->user = factory(User::class)->create();

        $this->actingAs($this->user);
    }

    public function testListingPlanets(): void
    {
//        $this->mockPlanetResponse();

        $response = $this->get('planets');

        $response
            ->assertSee('Alderaan')
            ->assertSee('2 times')
            ->assertSee('grasslands, mountains')
            ->assertSee('Yavin IV')
            ->assertSee('jungle, rainforests');
    }

    private function mockPlanetResponse(): void
    {
        $this->starWarsMockHandler->append(new Response(200, [], json_encode([
            'count' => 61,
            'next' => 'https://swapi.co/api/planets/?page=2',
            'previous' => null,
            'results' => [
                [
                    'name' => 'Alderaan',
                    'rotation_period' => '24',
                    'orbital_period' => '364',
                    'diameter' => '12500',
                    'climate' => 'temperate',
                    'gravity' => '1 standard',
                    'terrain' => 'grasslands, mountains',
                    'surface_water' => '40',
                    'population' => '2000000000',
                    'residents' => [
                        'https://swapi.co/api/people/5/',
                        'https://swapi.co/api/people/68/',
                        'https://swapi.co/api/people/81/',
                    ],
                    'films' => [
                        'https://swapi.co/api/films/6/',
                        'https://swapi.co/api/films/3/',
                        'https://swapi.co/api/films/1/',
                    ],
                    'created' => '2014-12-10T11:35:48.479000Z',
                    'edited' => '2014-12-20T20:58:18.420000Z',
                    'url' => 'https://swapi.co/api/planets/2/',
                ],
                [
                    'name' => 'Yavin IV',
                    'rotation_period' => '24',
                    'orbital_period' => '4818',
                    'diameter' => '10200',
                    'climate' => 'temperate, tropical',
                    'gravity' => '1 standard',
                    'terrain' => 'jungle, rainforests',
                    'surface_water' => '8',
                    'population' => '1000',
                    'residents' => [],
                    'films' => [
                        'https://swapi.co/api/films/1/',
                    ],
                    'created' => '2014-12-10T11:37:19.144000Z',
                    'edited' => '2014-12-20T20:58:18.421000Z',
                    'url' => 'https://swapi.co/api/planets/3/',
                ],
            ],
        ])));
    }
}
