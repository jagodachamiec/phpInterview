<?php

declare(strict_types=1);

namespace App\QuantityOfPairs;

use InvalidArgumentException;

class InvalidArgument extends InvalidArgumentException
{
    /**
     * @return static
     */
    public static function containZero() : self
    {
        return new self('Argument contains 0.');
    }

    /**
     * @return static
     */
    public static function invalidTypeOfItems() : self
    {
        return new self('Argument contains item(s) with incorrect type.');
    }

    /**
     * @return static
     */
    public static function outOfRange() : self
    {
        return new self('Argument contains out of range (-10 to 10) item(s).');
    }
}
