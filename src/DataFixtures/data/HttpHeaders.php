<?php

namespace App\DataFixtures\data;

class HttpHeaders
{
    public static string $name = 'Http headers';

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