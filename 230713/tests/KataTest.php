<?php

use App\CleanerService;
use App\SyntaxConverter;
use PHPUnit\Framework\TestCase;

class KataTest extends TestCase
{
    /**
     * @test
     * @dataProvider examples
     */
    function it_checks_examples($input, $output)
    {
        $cleaned = count(CleanerService::parse($input)->cleaned);

        $this->assertEquals($output, "Cleaned: {$cleaned}");
    }

    public function examples()
    {
        return [
            ["2
            10 22
            E 2
            N 1", "Cleaned: 4"],
            ["46
            15 200
            E 2
            N 1
            W 10
            S 20
            E 30
            N 40
            W 11
            S 22
            E 33
            N 44
            W 1
            W 10
            S 20
            E 30
            N 40
            W 11
            S 22
            E 33
            N 44
            S 1
            W 10
            S 20
            E 30
            N 40
            W 11
            S 22
            E 33
            N 44
            E 1
            W 10
            S 20
            E 30
            N 40
            W 11
            S 22
            E 33
            N 44
            N 1
            W 10
            S 20
            E 30
            N 40
            W 11
            S 22
            E 33
            N 44", "Cleaned: 1047"],
            ["5
            0 0
            W 2
            W 1
            W 4
            W 1
            W 0", "Cleaned: 9"]
        ];
    }
}
