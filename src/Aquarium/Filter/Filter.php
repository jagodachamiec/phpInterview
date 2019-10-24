<?php

declare(strict_types=1);

namespace App\Aquarium\Filter;

interface Filter
{
    public function turnOn() : void;

    public function turnOff() : void;
}
