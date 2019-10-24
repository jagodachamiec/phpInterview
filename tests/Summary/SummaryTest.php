<?php

declare(strict_types=1);

namespace App\Tests\Summary;

use App\Summary\Summary;
use InvalidArgumentException;
use PHPStan\Testing\TestCase;
use stdClass;

class SummaryTest extends TestCase
{
    /** @var Summary */
    private $summary;

    /**
     * @return mixed[]
     */
    public function exceptionProvider() : array
    {
        $stdClass = new stdClass();

        return [
            'bothArgumentsAsString' => ['2', '2'],
            'firstArgumentAsString' => ['2', 1],
            'secondArgumentAsString' => [2, '1'],
            'bothArgumentsAsFloats' => [1.1, 1.1],
            'firstArgumentAsFloat' => [1.1, 1],
            'secondArgumentAsFloat' => [2, 1.1],
            'bothArgumentsAsDoubles' => [1.12e3, 1.12e3],
            'firstArgumentAsDouble' => [1.12e3, 1],
            'secondArgumentAsDouble' => [2, 1.12e3],
            'bothArgumentsAsArrays' => [[], []],
            'firstArgumentAsArray' => [[], 1],
            'secondArgumentAsArray' => [2, []],
            'bothArgumentsAsClass' => [$stdClass, $stdClass],
            'firstArgumentAsClass' => [$stdClass, 1],
            'secondArgumentAsClass' => [2, $stdClass],
            'bothArgumentsAsFunction' => [
                static function () : void {
                },
                static function () : void {
                },
            ],
            'firstArgumentAsFunction' => [
                static function () : void {
                },
                1,
            ],
            'secondArgumentAsFunction' => [
                2,
                static function () : void {
                },
            ],
            'bothArgumentsAsBool' => [true, true],
            'firstArgumentAsBool' => [true, 1],
            'secondArgumentAsBool' => [2, true],
            'bothArgumentsAsNull' => [null, null],
            'firstArgumentAsNull' => [null, 1],
            'secondArgumentAsNull' => [2, null],
        ];
    }

    /**
     * @param mixed $firstArgument
     * @param mixed $secondArgument
     *
     * @dataProvider exceptionProvider
     */
    public function testSumThrowInvalidArgumentException($firstArgument, $secondArgument) : void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->summary->sum($firstArgument, $secondArgument);
    }

    /**
     * @return mixed[]
     */
    public function dataProvider() : array
    {
        return [
            'negativeNumbers' => [-1, -2, -3],
            'zero' => [0, 1, 1],
            'positiveNumbers' => [2, 1, 3],
        ];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testSum(int $firstArgument, int $secondArgument, int $expectedResult) : void
    {
        $this->assertEquals($expectedResult, $this->summary->sum($firstArgument, $secondArgument));
    }

    public function setUp() : void
    {
        $this->summary = new Summary();
    }
}
