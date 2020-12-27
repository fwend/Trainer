<?php

namespace App\DataFixtures\data;

class Composer
{
    public static string $name = 'Composer';

    public static array $data = [
        'general' => [
            [
                'name' => 'Test',
                'content' => 'Test',
                'answers' => [
                    'test',
                ],
                'note' => 'test',
                'link' => 'test'
            ]
        ]
    ];
}