<?php

namespace App;

use Closure;

class ClockCircuit
{
    protected int $value = 0;

    public function increase(int $value, Closure $onCycleChange) : void {
        for($i=0; $i<abs($value); $i++) {
            $value > 0 ? $this->value++ : $this->value--;

            $onCycleChange($this->value);
        }
    }

    public function getValue(): int {
        return $this->value;
    }

    public function isCycle(int $value) : bool {
        return $this->value === $value;
    }
}