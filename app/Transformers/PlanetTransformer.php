<?php

namespace App\Transformers;

use App\Dto\Planet;
use Illuminate\Support\Collection;

class PlanetTransformer
{
    public function toCollection(array $items): Collection
    {
        $collection = collect();

        foreach ($items as $item) {
            $collection->push($this->toDto($item));
        }

        return $collection;
    }

    public function toDto(array $item): Planet
    {
        return new Planet(
            $item['name'],
            (int) $item['diameter'],
            $item['climate'],
            (int) $item['population'],
            count($item['films'])
        );
    }
}
