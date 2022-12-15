<?php

namespace App;

class SyntaxConverter
{
    public const GROUPS = [
        1 => '',
        2 => 'abc',
        3 => 'def',
        4 => 'ghi',
        5 => 'jkl',
        6 => 'mno',
        7 => 'pqrs',
        8 => 'tuv',
        9 => 'wxyz',
        0 => ' '
    ];

    protected array $translationTable;

    public function __construct()
    {
        $this->translationTable = $this->generateTranslationTable();
    }

    protected function generateTranslationTable()
    {
        return array_reverse(array_merge(...array_map(
            fn($number, $group) => 
                ($split = str_split($group)) ?
                array_map(
                    fn($index, $letter) =>
                        ['regex' => sprintf('/%s{%s}/', $number, $index + 1), 'value' => $letter]
                    ,array_keys($split), $split
                ) : [],
            array_keys(self::GROUPS), self::GROUPS)
        ));
    }

    public function convert($string) : string
    {
        return array_reduce(
            $this->translationTable,
            fn($carry, $entry) => preg_replace($entry['regex'], $entry['value'], $carry),
            $string
        );
    }
}