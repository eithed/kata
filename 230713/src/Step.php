<?php

namespace App;

class Step
{
    public function __construct(
        public string $direction,
        public int $length
    ){

    }

    public static function parse(string $input): self
    {
        $arr = explode(' ', trim($input));

        return new self($arr[0], (int) $arr[1]);
    }
}