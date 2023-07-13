<?php

namespace App;

class Position
{
    public function __construct(
        public int $x,
        public int $y
    ){

    }

    public static function parse(string $input): self
    {
        $arr = explode(' ', trim($input));

        return new self((int) $arr[0], (int) $arr[1]);
    }

    public function __toString(): string
    {
        return $this->x.' '.$this->y;
    }
}