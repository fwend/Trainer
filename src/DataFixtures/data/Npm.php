<?php

namespace App\DataFixtures\data;

class Npm
{
    public static string $name = 'Npm';

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