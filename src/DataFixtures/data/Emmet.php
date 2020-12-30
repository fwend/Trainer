<?php

namespace App\DataFixtures\data;

class Emmet
{
    public static string $name = 'Emmet';

    public static array $data = [
        'html' => [
            [
                'name' => 'Input text',
                'content' => '<input type="text" name="" id="">',
                'answers' => [
                    'inp',
                    'input:text'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/'
            ]
        ],
        'css' => [
            [
                'name' => 'Display block',
                'content' => 'display:block;',
                'answers' => [
                    'd',
                    'd:b'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/'
            ],
            [
                'name' => 'Overflow hidden',
                'content' => 'overflow: hidden;',
                'answers' => [
                    'ov',
                    'ov:h'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/'
            ],
        ],
    ];
}