<?php

declare(strict_types=1);

namespace App\Aquarium\Filter;

final class ExternalFilterAdapter implements Filter
{
    /** @var ExternalFilter */
    private $externalFilter;

    public function __construct(ExternalFilter $externalFilter)
    {
        $this->externalFilter = $externalFilter;
    }

    public function turnOn() : void
    {
        $this->externalFilter->start();
    }

    public function turnOff() : void
    {
        $this->externalFilter->stop();
    }
}
