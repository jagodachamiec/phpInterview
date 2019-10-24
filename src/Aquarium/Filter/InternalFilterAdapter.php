<?php

declare(strict_types=1);

namespace App\Aquarium\Filter;

final class InternalFilterAdapter implements Filter
{
    /** @var InternalFilter */
    private $internalFilter;

    public function __construct(InternalFilter $internalFilter)
    {
        $this->internalFilter = $internalFilter;
    }

    public function turnOn() : void
    {
        $this->internalFilter->setTurnOn(true);
    }

    public function turnOff() : void
    {
        $this->internalFilter->setTurnOn(false);
    }
}
