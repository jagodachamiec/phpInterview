<?php

declare(strict_types=1);

namespace App\Aquarium;

use function in_array;

abstract class Observable
{
    /** @var Observer[] */
    private $observers;

    public function register(Observer $observer) : void
    {
        if (in_array($observer, $this->observers)) {
            return;
        }

        $this->observers = $observer;
    }

    protected function notify() : void
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}
