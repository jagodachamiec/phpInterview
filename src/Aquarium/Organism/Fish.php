<?php

declare(strict_types=1);

namespace App\Aquarium\Organism;

use App\Aquarium\Food\FishFood;
use App\Aquarium\Food\Food;

final class Fish extends Animal
{
    public function swim() : void
    {
    }

    protected function likesFood(Food $food) : bool
    {
        return $food instanceof FishFood;
    }
}
