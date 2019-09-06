<?php

namespace App\Http\Controllers;

use App\Services\StarWarsService;
use Illuminate\View\View;

class PlanetsController
{
    /**
     * Show all the planets
     *
     * @param StarWarsService $starWarsService
     * @return View
     */
    public function __invoke(StarWarsService $starWarsService): View
    {
        $planets = $starWarsService->getPlanets();

        return view('planets.indexe', compact('planets'));
    }
}
