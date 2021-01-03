<?php

namespace App\DataFixtures\data;

class Dns
{
    public static string $name = 'Dns';

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
        ],
        'records' => [
            [
                'name' => 'Test',
                'content' => 'Test',
                'answers' => [
                    'test',
                ],
                'note' => 'test',
                'link' => 'test'
            ]
        ],
    ];
}