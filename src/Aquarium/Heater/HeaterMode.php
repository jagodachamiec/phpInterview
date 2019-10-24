<?php

declare(strict_types=1);

namespace App\Aquarium\Heater;

interface HeaterMode
{
    public function heat() : void;
}
