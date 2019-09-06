<?php

namespace App\Dto;

class Planet
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $diameter;

    /**
     * @var string
     */
    private $climate;

    /**
     * @var int
     */
    private $population;

    /**
     * @var int
     */
    private $movieCount;

    public function __construct(
        string $name,
        int $diameter,
        string $climate,
        int $population,
        int $movieCount
    ) {
        $this->name = $name;
        $this->diameter = $diameter;
        $this->climate = $climate;
        $this->population = $population;
        $this->movieCount = $movieCount;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDiameter(): int
    {
        return $this->diameter;
    }

    public function getClimate(): string
    {
        return $this->climate;
    }

    public function getPopulation(): int
    {
        return $this->population;
    }

    public function getMovieCount(): int
    {
        return $this->movieCount;
    }
}
