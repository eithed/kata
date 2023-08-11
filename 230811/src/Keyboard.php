<?php

namespace App;

readonly class Keyboard
{
    public function __construct()
    {
        
    }

    public function translate(string $commands) : array
    {
        return array_filter(array_map(
            fn(string $command) => CommandParser::isCommand($command) ? CommandParser::getCommand($command) : null,
            explode("\n", $commands)
        ));
    }
}