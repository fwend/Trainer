<?php

namespace App\DataFixtures\data;

class LinuxCommandLine
{
    public static string $name = 'Linux command line';

    public static array $data = [
        'tail' => self::tail
    ];

    public const tail = [
        [
            'name' => 'Show the last 10 lines of a file',
            'content' => 'Show the last 10 lines of the file "test.txt"',
            'answers' => [
                'tail test.txt',
                'tail -10 test.txt',
                'tail -n10 test.txt'
            ],
            'note' => 'tail defaults to 10',
            'link' => 'https://www.man7.org/linux/man-pages/man1/tail.1.html'
        ],
        [
            'name' => 'Show the last 7 lines of a file',
            'content' => 'Show the last 7 lines of the file "test.txt"',
            'answers' => [
                'tail -7 test.txt',
                'tail -n7 test.txt'
            ],
            'link' => 'https://www.man7.org/linux/man-pages/man1/tail.1.html'
        ],
        [
            'name' => 'Show the last lines of a file starting from n',
            'content' => 'Show the last lines of "test.txt" starting from line 3',
            'answers' => [
                'tail -n +3 test.txt'
            ],
            'link' => 'https://www.man7.org/linux/man-pages/man1/tail.1.html'
        ]
    ];
}