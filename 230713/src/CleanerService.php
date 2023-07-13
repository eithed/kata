<?php

namespace App;

use WeakMap;

class CleanerService
{
    public array $cleaned = [];

    public function __construct(protected Position $p){
        $this->cleanPosition($p);
    }

    public function cleanPosition(Position $p): void{
        $this->cleaned[(string) $p] = true;
    }

    public function cleanStep(Step $s): void{
        for ($i=0; $i<$s->length; $i++){
            switch($s->direction){
                case 'E':
                    $this->p->x++;
                break;
                case 'W':
                    $this->p->x--;
                break;
                case 'N':
                    $this->p->y--;
                break;
                case 'S':
                    $this->p->y++;
                break;
            }

            $this->cleanPosition($this->p);
        }
    }
    
    public function move(array $steps): void {
        foreach($steps as $step) {
            $this->cleanStep($step);
        }
    }

    public static function parse(string $input): self {
        $commands = explode("\n", $input);
        $no = (int) array_shift($commands);

        $self = new self(Position::parse(array_shift($commands)));
        $self->move(array_map(fn(string $command) => Step::parse($command), array_slice($commands, 0, $no)));

        return $self;
    }
}