<?php

namespace App;

use Closure;

readonly class CPU
{
    protected Register $x;
    protected ClockCircuit $clockCircuit;

    public function __construct(
        protected Closure $onCycleChange, 
        protected Closure $onRegisterChange)
    {
        $this->x = new Register;
        $this->clockCircuit = new ClockCircuit;
    }

    public function isValid(int $value) : bool {
        return $this->clockCircuit->isCycle($value);
    }
    
    public function getSignalStrength() : int {
        return $this->x->getValue() * $this->clockCircuit->getValue();
    }

    public function increaseCycles(int $value) : void {
        $this->clockCircuit->increase($value, function($value){
            ($this->onCycleChange)($this);
        });
    }

    public function increaseRegister(int $value) : void {
        $this->x->increase($value, function($value){
            ($this->onRegisterChange)($this);
        });
    }

    public function runCommands(array $commands) : array {
        $return = [];

        foreach ($commands as $command) {
            $command->execute($this);
        }

        return $return;
    }
}