<?php

declare(strict_types=1);

namespace App\Aquarium\Organism;

use App\Aquarium\Food\Food;

abstract class Animal extends Organism
{
    /** @var bool */
    private $isHungry;

    abstract public function swim() : void;

    public function respondToFood(Food $food) : void
    {
        if (! $this->isHungry || ! $this->likesFood($food)) {
            return;
        }

        $this->eat();
    }

    private function eat() : void
    {
    }

    abstract protected function likesFood(Food $food) : bool;
}
