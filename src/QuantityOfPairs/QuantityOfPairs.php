<?php

declare(strict_types=1);

namespace App\QuantityOfPairs;

use Ds\Sequence;
use Ds\Vector;
use function is_int;

class QuantityOfPairs
{
    /**
     * @param  mixed[] $inputCollection
     *
     * @throw  InvalidArgumentException
     */
    public function countPairs(array $inputCollection) : int
    {
        $numbers = new Vector($inputCollection);

        $this->validate($numbers);

        $counter = 0;
        while (! $numbers->isEmpty()) {
            $currentNumber  = $numbers->first();
            $oppositeNumber = -$currentNumber;
            if ($numbers->contains($oppositeNumber)) {
                $counter++;
                $numbers->remove($numbers->find($oppositeNumber));
            }
            $numbers->remove($numbers->find($currentNumber));
        }

        return $counter;
    }

    /**
     * @param Sequence|mixed[] $numbers
     */
    private function validate(Sequence $numbers) : void
    {
        $incorrectTypes = $numbers->filter(
            static function ($item) {
                return ! is_int($item);
            }
        );

        if (! $incorrectTypes->isEmpty()) {
            throw InvalidArgument::invalidTypeOfItems();
        }

        if ($numbers->contains(0)) {
            throw InvalidArgument::containZero();
        }

        $outOfRange = $numbers->filter(
            static function (int $item) {
                return $item < -10 || $item > 10;
            }
        );

        if (! $outOfRange->isEmpty()) {
            throw InvalidArgument::outOfRange();
        }
    }
}
