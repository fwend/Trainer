<?php

namespace App\DataFixtures\data;

class Doctrine
{
    public static string $name = 'Doctrine';

    public static array $data = [
        'general' => [
            [
                'name' => 'List doctrine commands',
                'content' => 'List all doctrine commands',
                'answers' => [
                    'bin/console list doctrine',
                ],
                'note' => '',
                'link' => ''
            ],
            [
                'name' => 'Doctrine help',
                'content' => 'Get help for the command doctrine:cache:flush',
                'answers' => [
                    'bin/console doctrine:cache:flush --help',
                ],
                'note' => '',
                'link' => ''
            ],
            [
                'name' => 'Schema update',
                'content' => 'Create or update the database schema',
                'answers' => [
                    'bin/console doctrine:schema:update --force',
                    'bin/console do:sc:up -f',
                ],
                'note' => '',
                'link' => ''
            ],
            [
                'name' => 'Schema update and dump',
                'content' => 'Create or update the database schema, and dump the generated SQL to the screen',
                'answers' => [
                    'bin/console doctrine:schema:update --force --dump-sql',
                    'bin/console do:sc:up -f --dump-sql',
                ],
                'note' => '',
                'link' => ''
            ],
            [
                'name' => 'Preview schema update',
                'content' => 'Preview the sql that would be executed if you forced it',
                'answers' => [
                    'bin/console doctrine:schema:update --dump-sql',
                    'bin/console do:sc:up --dump-sql',
                ],
                'note' => '',
                'link' => ''
            ],
        ]
    ];
}