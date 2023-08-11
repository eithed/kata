<?php

namespace App\Commands;

use App\CPU;

abstract class Command
{
    protected static int $cycles;
    
    public function __construct(
        protected array $arguments
    ){}

    public function execute(CPU $cpu) : void {
        $cpu->increaseCycles(static::$cycles);
    }
}