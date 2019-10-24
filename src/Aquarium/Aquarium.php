<?php

declare(strict_types=1);

namespace App\Aquarium;

use App\Aquarium\Filter\Filter;
use App\Aquarium\Food\Food;
use App\Aquarium\Heater\Heater;
use App\Aquarium\Organism\Animal;
use App\Aquarium\Organism\Organism;
use function in_array;

final class Aquarium extends Observable
{
    /** @var Organism[] */
    private $organisms;
    /** @var Light */
    private $light;
    /** @var Filter */
    private $filter;
    /** @var Heater */
    private $heater;

    public function __construct(Light $light, Filter $filter, Heater $heater)
    {
        $this->organisms = [];
        $this->light     = $light;
        $this->filter    = $filter;
        $this->heater    = $heater;
    }

    public function addOrganism(Organism $organism) : void
    {
        if (in_array($organism, $this->organisms, true)) {
            return;
        }

        $this->organisms[] = $organism;
        $this->notify();
    }

    public function installFilter(Filter $filter) : void
    {
        $this->filter = $filter;
    }

    public function feedAnimals(Food $food) : void
    {
        foreach ($this->organisms as $organism) {
            if (! ($organism instanceof Animal)) {
                continue;
            }

            $organism->respondToFood($food);
        }
    }

    public function turnOnTheLight() : void
    {
        $this->light->turnOn();
        foreach ($this->organisms as $organism) {
            if (! ($organism instanceof Animal)) {
                continue;
            }

            $organism->swim();
        }
    }
}
