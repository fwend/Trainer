<?php

namespace App\DataFixtures\data;

class Mysql
{
    public static string $name = 'Mysql';

    public static array $data = [
        'general' => [
            [
                'name' => 'Create database',
                'content' => 'Create database "test"',
                'answers' => [
                    'CREATE DATABASE test;',
                ],
                'note' => '',
                'link' => 'https://www.mysqltutorial.org/mysql-create-database/'
            ],
            [
                'name' => 'List databases',
                'content' => 'List all databases',
                'answers' => [
                    'SHOW DATABASES;',
                ],
                'note' => '',
                'link' => 'https://www.mysqltutorial.org/mysql-show-databases/'
            ],
            [
                'name' => 'Delete database',
                'content' => 'Delete database "test"',
                'answers' => [
                    'DROP DATABASE test;',
                ],
                'note' => '',
                'link' => 'https://www.mysqltutorial.org/mysql-drop-database/'
            ],
            [
                'name' => 'Select database',
                'content' => 'Select "test" database to work with',
                'answers' => [
                    'USE test;',
                ],
                'note' => '',
                'link' => 'https://www.mysqltutorial.org/mysql-select-database/'
            ],
            [
                'name' => 'Current database name',
                'content' => 'Find out the name of the currently selected database',
                'answers' => [
                    'SELECT database();',
                ],
                'note' => '',
                'link' => 'https://www.tutorialspoint.com/how-to-check-which-database-is-selected-in-mysql'
            ],
            [
                'name' => 'Create database',
                'content' => 'Create database "test"',
                'answers' => [
                    'CREATE DATABASE test;',
                ],
                'note' => '',
                'link' => 'https://www.mysqltutorial.org/mysql-create-database/'
            ],
            [
                'name' => 'Create table',
                'content' => 'Create a testtable with a primary key id column',
                'answers' => [
                    'CREATE TABLE testtable (id INT AUTO_INCREMENT PRIMARY KEY);',
                ],
                'note' => '',
                'link' => 'https://www.mysqltutorial.org/mysql-create-table/'
            ],
            [
                'name' => 'Column definition 1',
                'content' => 'Create a string column "column1", variable length of 100, not null, default null',
                'answers' => [
                    'column1 VARCHAR(100) NOT NULL DEFAULT NULL',
                ],
                'note' => '',
                'link' => 'https://www.mysqltutorial.org/mysql-create-table/'
            ],
            [
                'name' => 'Column definition 2',
                'content' => 'Create a integer column "column1" that is unique',
                'answers' => [
                    'column1 INT NOT NULL UNIQUE',
                ],
                'note' => '',
                'link' => 'https://www.mysqltutorial.org/mysql-unique-constraint/'
            ],
            [
                'name' => 'Unique',
                'content' => 'Make column1 and column2 unique',
                'answers' => [
                    'UNIQUE(column1,column2)',
                ],
                'note' => 'Also: CONSTRAINT name UNIQUE (column1 , column2)',
                'link' => 'https://www.mysqltutorial.org/mysql-unique-constraint/'
            ],
            [
                'name' => 'Delete table',
                'content' => 'Delete table "test"',
                'answers' => [
                    'DROP TABLE test;',
                ],
                'note' => 'Also DROP TABLE IF EXISTS test; DROP TABLE table1, table2',
                'link' => 'https://www.mysqltutorial.org/mysql-create-database/'
            ],
            [
                'name' => 'Add row to table',
                'content' => 'Add a row to table "test", with column1 and column2',
                'answers' => [
                    'INSERT INTO test (column1, column2) VALUES(val1, val2);',
                ],
                'note' => 'Also: VALUES(val1, val2), (val3, val4) etc',
                'link' => 'https://www.mysqltutorial.org/mysql-insert-statement.aspx'
            ],
            [
                'name' => 'Update row 1',
                'content' => 'Update column1 value to "val2" in table "test"...',
                'answers' => [
                    'UPDATE TABLE test SET column1 = val2',
                ],
                'note' => '',
                'link' => 'https://www.mysqltutorial.org/mysql-alter-table.aspx'
            ],
            [
                'name' => 'Update row 2',
                'content' => 'Update column1 value to column2 value in table "test"...',
                'answers' => [
                    'UPDATE TABLE test SET column1 = column2',
                ],
                'note' => '',
                'link' => 'https://www.mysqltutorial.org/mysql-alter-table.aspx'
            ],
            [
                'name' => 'List warnings',
                'content' => 'List warnings if any',
                'answers' => [
                    'SHOW WARNINGS;',
                ],
                'note' => '',
                'link' => 'https://www.mysqltutorial.org/mysql-cheat-sheet.aspx'
            ],
            [
                'name' => 'Change table 1',
                'content' => 'Change table column "column1" of table "test", int nullable default 0',
                'answers' => [
                    'ALTER TABLE test modify column1 INT NULL DEFAULT 0;',
                ],
                'note' => '',
                'link' => 'https://www.mysqltutorial.org/mysql-alter-table.aspx'
            ],
            [
                'name' => 'Change table 2',
                'content' => 'Change table column name "column1" of table "test" to column2',
                'answers' => [
                    'ALTER TABLE test CHANGE COLUMN column1 column2;',
                ],
                'note' => 'Can be followed by [FIRST|AFTER column_name]',
                'link' => 'https://www.mysqltutorial.org/mysql-alter-table.aspx'
            ],
            [
                'name' => 'Change table 3',
                'content' => 'Add column "column1" of table "test"...',
                'answers' => [
                    'ALTER TABLE test ADD COLUMN column1',
                ],
                'note' => 'Can be followed by [FIRST|AFTER column_name]',
                'link' => 'https://www.mysqltutorial.org/mysql-alter-table.aspx'
            ],
            [
                'name' => 'Change table 4',
                'content' => 'Delete column "column1" of table "test".',
                'answers' => [
                    'ALTER TABLE test DROP COLUMN column1;',
                ],
                'note' => '',
                'link' => 'https://www.mysqltutorial.org/mysql-alter-table.aspx'
            ],
            [
                'name' => 'Grouping',
                'content' => 'Count unique values of "column1" of table "test".',
                'answers' => [
                    'SELECT COUNT(DISTINCT column1) FROM test GROUP BY column1;',
                ],
                'note' => '',
                'link' => 'https://www.mysqltutorial.org/mysql-group-by.aspx'
            ]
        ]
    ];
}