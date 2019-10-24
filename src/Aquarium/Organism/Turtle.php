<?php

declare(strict_types=1);

namespace App\Aquarium\Organism;

use App\Aquarium\Food\Food;
use App\Aquarium\Food\TurtleFood;

final class Turtle extends Animal
{
    public function swim() : void
    {
    }

    protected function likesFood(Food $food) : bool
    {
        return $food instanceof TurtleFood;
    }
}
