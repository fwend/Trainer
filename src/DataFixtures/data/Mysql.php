<?php

namespace App\DataFixtures\data;

class Mysql
{
    public static string $name = 'Mysql';

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