<?php

namespace App\Commands;

class Noop extends Command
{
    protected static int $cycles = 1;
}