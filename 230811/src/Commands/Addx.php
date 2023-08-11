<?php

namespace App\Commands;

use App\CPU;

class Addx extends Command
{
    protected static int $cycles = 2;

    public function execute(CPU $cpu) : void {
        parent::execute($cpu);

        $cpu->increaseRegister($this->arguments[0]);
    }
}