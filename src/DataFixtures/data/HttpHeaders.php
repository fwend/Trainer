<?php

namespace App\DataFixtures\data;

class HttpHeaders
{
    public static string $name = 'Http headers';

    public static array $data = [
        'general' => [
            [
                'name' => 'Content negotiation: Media Types',
                'content' => 'Media type(s) that is/are acceptable for the response.',
                'answers' => [
                    'Accept',
                ],
                'note' => 'Accept: <MIME_type>/<MIME_subtype>, for instance:  Accept: text/html',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_header_fields'
            ],
            [
                'name' => 'Content negotiation: Character sets',
                'content' => 'Character sets that are acceptable.',
                'answers' => [
                    'Accept-Charset',
                ],
                'note' => 'Example: Accept-Charset: utf-8. This header is rarely sent due to fingerprinting concerns, and the default is almost always utf-8 anyway.',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Accept-Charset'
            ],
            [
                'name' => 'Content negotiation: Encodings',
                'content' => 'List of acceptable encodings (usually a compression algorithm).',
                'answers' => [
                    'Accept-Encoding',
                ],
                'note' => 'Accept-Encoding: gzip, deflate',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Accept-Encoding'
            ],
            [
                'name' => 'Content negotiation: Language',
                'content' => 'List of acceptable human languages for response.',
                'answers' => [
                    'Accept-Language',
                ],
                'note' => 'Accept-Language: en-US',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Accept-Language'
            ],
            [
                'name' => 'Connection management 1',
                'content' => 'Which header controls whether or not the network connection stays open after the current transaction finishes.',
                'answers' => [
                    'Connection',
                ],
                'note' => 'Accept-Encoding: gzip, deflate',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Connection'
            ],
            [
                'name' => 'Connection management 2',
                'content' => 'Which header allows the sender to hint about how the connection may be used to set a timeout and a maximum amount of requests.',
                'answers' => [
                    'Keep-Alive',
                ],
                'note' => 'Keep-Alive: timeout=5, max=1000',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Keep-Alive'
            ],
            [
                'name' => 'Cookies 1',
                'content' => 'Contains stored HTTP cookies previously sent by the server with the Set-Cookie header.',
                'answers' => [
                    'Cookie',
                ],
                'note' => 'Cookie: name=value; name2=value2; name3=value3',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Cookie'
            ],
            [
                'name' => 'Cookies 2',
                'content' => 'Send cookies from the server to the user-agent.',
                'answers' => [
                    'Set-Cookie',
                ],
                'note' => 'Set-Cookie: <cookie-name>=<cookie-value>; <attributes>. For instance: Set-Cookie: id=a3fWa; Expires=Wed, 21 Oct 2015 07:28:00 GMT',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie'
            ],
            [
                'name' => 'Authentication 1',
                'content' => 'Defines the authentication method that should be used to access a resource.',
                'answers' => [
                    'WWW-Authenticate',
                ],
                'note' => 'WWW-Authenticate: Basic realm="Access to the staging site", charset="UTF-8"',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/WWW-Authenticate'
            ],
            [
                'name' => 'Authentication 2',
                'content' => 'Contains the credentials to authenticate a user-agent with a server.',
                'answers' => [
                    'Authorization',
                ],
                'note' => 'Authorization: Basic YWxhZGRpbjpvcGVuc2VzYW1l',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Authorization'
            ],
            [
                'name' => 'Caching 1',
                'content' => 'Contains the time in seconds the object has been in a proxy cache.',
                'answers' => [
                    'Age',
                ],
                'note' => 'Age: 24',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Age'
            ],
            [
                'name' => 'Caching 2',
                'content' => 'Holds directives for caching in both requests and responses.',
                'answers' => [
                    'Cache-Control',
                ],
                'note' => 'Cache-Control: no-cache, Cache-Control: max-age=<seconds>',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Cache-Control'
            ],
            [
                'name' => 'Caching 3',
                'content' => 'Contains the date/time after which the response is considered stale.',
                'answers' => [
                    'Expires',
                ],
                'note' => 'Expires: <http-date>, Expires: Wed, 21 Oct 2015 07:28:00 GMT',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Expires'
            ],
            [
                'name' => '',
                'content' => '.',
                'answers' => [
                    '',
                ],
                'note' => '',
                'link' => ''
            ],























            'attributes' => [

            ]
        ]
    ];
}