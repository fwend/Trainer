<?php

namespace App\DataFixtures\data;

class Ports
{
    public static string $name = 'Ports';

    public static array $data = [
        'general' => [
            [
                'name' => 'Echo',
                'content' => 'Echo',
                'answers' => [
                    '7',
                ],
                'note' => '',
                'link' => ''
            ],
            [
                'name' => 'Quote of the Day (QOTD)',
                'content' => 'Quote of the Day',
                'answers' => [
                    '17',
                ],
                'note' => '',
                'link' => ''
            ],
            [
                'name' => 'File Transfer Protocol (FTP) data transfer',
                'content' => 'File Transfer Protocol data transfer',
                'answers' => [
                    '20',
                ],
                'note' => '',
                'link' => ''
            ],
            [
                'name' => 'File Transfer Protocol (FTP) control',
                'content' => 'File Transfer Protocol control',
                'answers' => [
                    '21',
                ],
                'note' => '',
                'link' => ''
            ],
            [
                'name' => 'Secure Shell (SSH)',
                'content' => 'Secure Shell',
                'answers' => [
                    '22',
                ],
                'note' => '',
                'link' => 'https://en.wikipedia.org/wiki/SSH_(Secure_Shell)'
            ],
            [
                'name' => '	Simple Mail Transfer Protocol (SMTP)',
                'content' => 'Simple Mail Transfer Protocol',
                'answers' => [
                    '25',
                ],
                'note' => '',
                'link' => ''
            ],
        ]
    ];
}