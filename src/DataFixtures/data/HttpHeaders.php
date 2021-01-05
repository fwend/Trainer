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
                'name' => 'Conditionals 1',
                'content' => 'The last modification date of the resource. Less accurate than an ETag header, it is a fallback mechanism. Conditional requests containing If-Modified-Since or If-Unmodified-Since headers make use of this field.',
                'answers' => [
                    'Last-Modified',
                ],
                'note' => 'Last-Modified: Wed, 21 Oct 2015 07:28:00 GMT. ',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Last-Modified'
            ],
            [
                'name' => 'Conditionals 2',
                'content' => 'A unique string identifying the version of the resource. Conditional requests using If-Match and If-None-Match use this value to change the behavior of the request.',
                'answers' => [
                    'ETag',
                ],
                'note' => 'ETag: "33a64df551425fcc55e4d42a148795d9f25f89d4". ETag: W/"0815"',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/ETag'
            ],
            [
                'name' => 'Conditionals 3',
                'content' => 'Makes the request conditional, and applies the method only if the stored resource matches one of the given ETags.',
                'answers' => [
                    'If-Match',
                ],
                'note' => 'If-Match: "bfc13a64729c4290ef5b2c2730249c88ca92d82d"',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/If-Match'
            ],
            [
                'name' => 'Conditionals 4',
                'content' => 'Makes the request conditional, and applies the method only if the stored resource doesn\'t match any of the given ETags. This is used to update caches (for safe requests), or to prevent to upload a new resource when one already exists.',
                'answers' => [
                    'If-None-Match',
                ],
                'note' => 'If-None-Match: W/"67ab43", "54ed21", "7892dd"',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/If-None-Match'
            ],
            [
                'name' => 'Conditionals 5',
                'content' => 'Makes the request conditional, and expects the entity to be transmitted only if it has been modified after the given date. This is used to transmit data only when the cache is out of date.',
                'answers' => [
                    'If-Modified-Since',
                ],
                'note' => 'If-Modified-Since: Wed, 21 Oct 2015 07:28:00 GMT',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/If-Modified-Since'
            ],
            [
                'name' => 'Conditionals 6',
                'content' => 'Makes the request conditional, and expects the entity to be transmitted only if it has not been modified after the given date. This ensures the coherence of a new fragment of a specific range with previous ones, or to implement an optimistic concurrency control system when modifying existing documents.',
                'answers' => [
                    'If-Unmodified-Since',
                ],
                'note' => 'If-Unmodified-Since: Wed, 21 Oct 2015 07:28:00 GMT',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/If-Unmodified-Since'
            ],
            [
                'name' => 'Conditionals 7',
                'content' => 'Determines how to match request headers to decide whether a cached response can be used rather than requesting a fresh one from the origin server.',
                'answers' => [
                    'Vary',
                ],
                'note' => 'Vary: User-Agent',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Vary'
            ],
            [
                'name' => 'Message body information 1',
                'content' => 'The size of the resource, in decimal number of bytes.',
                'answers' => [
                    'Content-Length',
                ],
                'note' => 'Content-Length: 523',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Length'
            ],
            [
                'name' => 'Message body information 2',
                'content' => 'Indicates the media type of the resource.',
                'answers' => [
                    'Content-Type',
                ],
                'note' => 'Content-Type: multipart/form-data; boundary=something',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Type'
            ],
            [
                'name' => 'Message body information 3',
                'content' => 'Used to specify the compression algorithm.',
                'answers' => [
                    'Content-Encoding',
                ],
                'note' => 'Content-Encoding: gzip',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Encoding'
            ],
            [
                'name' => 'Message body information 4',
                'content' => 'Describes the human language(s) intended for the audience.',
                'answers' => [
                    'Content-Language',
                ],
                'note' => 'Content-Language: de-DE',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Language'
            ],
            [
                'name' => 'Message body information 5',
                'content' => 'Indicates an alternate location for the returned data.',
                'answers' => [
                    'Content-Location',
                ],
                'note' => 'Content-Location: /documents/foo.json',
                'link' => 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Location#Examples'
            ],























            'attributes' => [

            ]
        ]
    ];
}