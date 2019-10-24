<?php

declare(strict_types=1);

namespace App\Aquarium;

interface Observer
{
    public function update() : void;
}
