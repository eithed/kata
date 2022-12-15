<?php

use App\SyntaxConverter;
use PHPUnit\Framework\TestCase;

class KataTest extends TestCase
{
    /**
     * @test
     * @dataProvider examples
     */
    function it_checks_examples($numbers, $text)
    {
        $this->assertEquals($text, (new SyntaxConverter)->convert($numbers));
    }

    public function examples()
    {
        return [
            ["443355555566604466690277733099966688",  "hello how are you"],
            ["55282",  "kata"],
            ["22266631339277717777",  "codewars"],
            ["66885551555",  "null"],
            ["833998",  "text"],
            ["000",  "   "],
        ];
    }
}
