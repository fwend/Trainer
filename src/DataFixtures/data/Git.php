<?php

namespace App\DataFixtures\data;

class Git
{
    public static string $name = 'Git';

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