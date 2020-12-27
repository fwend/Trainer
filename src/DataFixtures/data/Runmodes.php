<?php

namespace App\DataFixtures\data;

use App\Entity\RunMode;

class Runmodes
{
    public static array $data = [
        [
            'type' => RunMode::TYPE_RANDOM,
            'name' => 'Random 10',
            'length' => 10,
            'position' => 0,
        ],
        [
            'type' => RunMode::TYPE_RANDOM,
            'name' => 'Random 25',
            'length' => 25,
            'position' => 1,
        ],
        [
            'type' => RunMode::TYPE_RANDOM,
            'name' => 'Random 50',
            'length' => 50,
            'position' => 2,
        ],
        [
            'type' => RunMode::TYPE_ALL,
            'name' => 'All',
            'length' => null,
            'position' => 3,
        ],
    ];
}