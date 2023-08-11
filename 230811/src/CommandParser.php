<?php

namespace App;

use App\Commands\Addx;
use App\Commands\Command;
use App\Commands\Noop;
use RuntimeException;

class CommandParser
{
    protected static array $commands = [
        'noop' => Noop::class,
        'addx' => Addx::class,
    ];

    public static function isCommand(string $command) : bool {
        $arguments = self::parse($command);
        $commandName = $arguments[0];

        return array_key_exists($commandName, self::$commands);
    }

    protected static function parse(string $command) : array {
        return explode(' ', trim($command));
    }

    public static function getCommand(string $command) : Command {
        $arguments = self::parse($command);
        $commandName = $arguments[0];

        if (self::isCommand($command))
            return new self::$commands[$commandName](array_slice($arguments, 1));

        throw new RuntimeException('Command does not exist');
    }
}