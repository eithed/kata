<?php

namespace App;

readonly class Human
{
    public function enter(string $input, array $cycles) : array
    {
        $keyboard = new Keyboard;

        $commands = $keyboard->translate($input);

        $return = [];
        $cpu = new CPU(
            onCycleChange: function(CPU $cpu) use (&$cycles, &$return) : void {
                if (!empty($cycles) && $cpu->isValid($cycles[0])) {
                    $return[] = $cpu->getSignalStrength();
                    
                    array_shift($cycles);
                }
            },
            onRegisterChange: function(CPU $cpu){}
        );

        $cpu->runCommands($commands);

        return $return;
    }
}