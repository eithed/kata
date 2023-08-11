<?php

namespace App;

use Closure;

class Register
{
    protected int $value = 1;

    public function increase(int $value, Closure $onRegisterChange) : void {
        for($i=0; $i<abs($value); $i++) {
            $value > 0 ? $this->value++ : $this->value--;

            $onRegisterChange($this->value);
        }
    }

    public function getValue(): int {
        return $this->value;
    }
}