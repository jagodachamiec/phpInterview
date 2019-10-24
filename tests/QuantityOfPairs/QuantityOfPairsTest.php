<?php

declare(strict_types=1);

namespace App\Tests\QuantityOfPairs;

use App\QuantityOfPairs\InvalidArgument;
use App\QuantityOfPairs\QuantityOfPairs;
use PHPUnit\Framework\TestCase;
use stdClass;

class QuantityOfPairsTest extends TestCase
{
    private const INVALID_TYPES_EXCEPTION_MESSAGE = 'Argument contains item(s) with incorrect type.';
    private const OUT_OF_RANGE_EXCEPTION_MESSAGE  = 'Argument contains out of range (-10 to 10) item(s).';
    /** @var QuantityOfPairs */
    private $quantityOfPair;

    /**
     * @return mixed[]
     */
    public function dataProvider() : array
    {
        return [
            'empty' => [[], 0],
            'oneItem' => [[1], 0],
            'twoItemsNotPair' => [[1, 2], 0],
            'onePair' => [[1, -1], 1],
            'doubleOnePair' => [[1, 1, -1, -1], 2],
            'onePairWithAdditionalNegative' => [[1, 1, -1], 1],
            'fivePairs' => [[3, 6, -3, 5, -10, 3, 10, 1, 7, -1, -9, -8, 7, 7, -7, -2, -7], 5],
        ];
    }

    /**
     * @param int[] $argument
     *
     * @dataProvider dataProvider
     */
    public function testCount(array $argument, int $result) : void
    {
        $this->assertEquals($result, $this->quantityOfPair->countPairs($argument));
    }

    /**
     * @return mixed[]
     */
    public function exceptionProvider() : array
    {
        return [
            'zero' => [[0], 'Argument contains 0.'],
            'outOfNegativeRange' => [[-11], self::OUT_OF_RANGE_EXCEPTION_MESSAGE],
            'outOfPositiveRange' => [[11, 2], self::OUT_OF_RANGE_EXCEPTION_MESSAGE],
            'string' => [['1', -1], self::INVALID_TYPES_EXCEPTION_MESSAGE],
            'float' => [[1.1, 1, -1, -1], self::INVALID_TYPES_EXCEPTION_MESSAGE],
            'double' => [[3, 1.2e3], self::INVALID_TYPES_EXCEPTION_MESSAGE],
            'null' => [[3, null], self::INVALID_TYPES_EXCEPTION_MESSAGE],
            'array' => [[3, []], self::INVALID_TYPES_EXCEPTION_MESSAGE],
            'object' => [[3, new stdClass()], self::INVALID_TYPES_EXCEPTION_MESSAGE],
            'closure' => [
                [
                    3,
                    static function () : void {
                    },
                ],
                self::INVALID_TYPES_EXCEPTION_MESSAGE,
            ],
            'bool' => [[3, true], self::INVALID_TYPES_EXCEPTION_MESSAGE],
        ];
    }

    /**
     * @param mixed[] $argument
     *
     * @dataProvider exceptionProvider
     */
    public function testCountThrowInvalidArgumentException(array $argument, string $messageException) : void
    {
        $this->expectException(InvalidArgument::class);
        $this->expectExceptionMessage($messageException);

        $this->quantityOfPair->countPairs($argument);
    }

    public function setUp() : void
    {
        $this->quantityOfPair = new QuantityOfPairs();
    }
}
