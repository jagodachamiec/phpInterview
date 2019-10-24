<?php

declare(strict_types=1);

namespace App\Summary;

use InvalidArgumentException;
use function is_int;

class Summary
{
    /**
     * @param mixed $a
     * @param mixed $b
     *
     * @throws InvalidArgumentException
     */
    public function sum($a, $b) : int
    {
        if (! is_int($a) || ! is_int($b)) {
            throw new InvalidArgumentException();
        }

        return $a + $b;
    }
}
