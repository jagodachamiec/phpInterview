<?php

declare(strict_types=1);

namespace App\Aquarium\Heater;

final class Heater
{
    /** @var HeaterMode */
    private $heaterMode;

    public function __construct(HeaterMode $heaterMode)
    {
        $this->heaterMode = $heaterMode;
    }

    public function heat() : void
    {
        $this->heaterMode->heat();
    }

    public function setHeaterMode(HeaterMode $heaterMode) : void
    {
        $this->heaterMode = $heaterMode;
    }
}
