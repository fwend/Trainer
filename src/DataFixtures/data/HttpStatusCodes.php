<?php

namespace App\DataFixtures\data;

class HttpStatusCodes
{
    public static string $name = 'Http status codes';

    public static array $data = [
        'general' => [
            [
                'name' => 'Informational: Continue',
                'content' => 'Continue',
                'answers' => [
                    '100',
                ],
                'note' => 'the server has received the request headers and the client should proceed to send the request body (in the case of a request for which a body needs to be sent; for example, a POST request). Sending a large request body to a server after a request has been rejected for inappropriate headers would be inefficient. To have a server check the request\'s headers, a client must send Expect: 100-continue as a header in its initial request and receive a 100 Continue status code in response before sending the body. ',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Informational: Switching Protocols',
                'content' => 'Switching Protocols',
                'answers' => [
                    '101',
                ],
                'note' => 'the requester has asked the server to switch protocols and the server has agreed to do so. ',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Success: OK',
                'content' => 'OK',
                'answers' => [
                    '200',
                ],
                'note' => 'Standard response for successful HTTP requests',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Success: Created',
                'content' => 'Created',
                'answers' => [
                    '201',
                ],
                'note' => 'the request has been fulfilled, resulting in the creation of a new resource.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Success: Accepted',
                'content' => 'Accepted',
                'answers' => [
                    '202',
                ],
                'note' => 'the request has been accepted for processing, but the processing has not been completed. The request might or might not be eventually acted upon, and may be disallowed when processing occurs.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Success: No Content',
                'content' => 'No Content',
                'answers' => [
                    '204',
                ],
                'note' => 'the server successfully processed the request, and is not returning any content.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Redirection: Moved Permanently',
                'content' => 'Moved Permanently',
                'answers' => [
                    '301',
                ],
                'note' => 'this and all future requests should be directed to the given URI',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Redirection: Not Modified',
                'content' => 'Not Modified',
                'answers' => [
                    '304',
                ],
                'note' => 'Indicates that the resource has not been modified since the version specified by the request headers If-Modified-Since or If-None-Match. ',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Redirection: Temporary Redirect',
                'content' => 'Temporary Redirect',
                'answers' => [
                    '307',
                ],
                'note' => '',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: Bad Request',
                'content' => 'Bad Request',
                'answers' => [
                    '400',
                ],
                'note' => 'the server cannot or will not process the request due to an apparent client error (e.g. malformed request syntax, size too large)',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: Unauthorized',
                'content' => 'Unauthorized',
                'answers' => [
                    '401',
                ],
                'note' => '',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: Forbidden',
                'content' => 'Forbidden',
                'answers' => [
                    '403',
                ],
                'note' => 'the request contained valid data and was understood by the server, but the server is refusing action due to the user having insufficient permissions',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: Not Found',
                'content' => 'Not Found',
                'answers' => [
                    '404',
                ],
                'note' => 'the requested resource could not be found.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: Method Not Allowed',
                'content' => 'Method Not Allowed',
                'answers' => [
                    '405',
                ],
                'note' => 'a request method is not supported for the requested resource; for example, a GET request on a form that requires data to be presented via POST, or a PUT request on a read-only resource.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: Not Acceptable',
                'content' => 'Not Acceptable',
                'answers' => [
                    '406',
                ],
                'note' => 'the requested resource is capable of generating only content not acceptable according to the Accept headers sent in the request.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: Request Timeout',
                'content' => 'Request Timeout',
                'answers' => [
                    '408',
                ],
                'note' => 'the server timed out waiting for the request.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: Conflict',
                'content' => 'Conflict',
                'answers' => [
                    '409',
                ],
                'note' => 'Indicates that the request could not be processed because of conflict in the current state of the resource, such as an edit conflict between multiple simultaneous updates',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => "Client Error: I'm a teapot",
                'content' => "I'm a teapot",
                'answers' => [
                    '418',
                ],
                'note' => 'the RFC specifies this code should be returned by teapots requested to brew coffee. April Fools\' Joke',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => "Client Error: Unavailable For Legal Reasons",
                'content' => "Unavailable For Legal Reasons",
                'answers' => [
                    '451',
                ],
                'note' => 'a server operator has received a legal demand to deny access to a resource or to a set of resources that includes the requested resource. The code 451 was chosen as a reference to the novel Fahrenheit 451.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Server Error: Internal Server Error',
                'content' => 'Internal Server Error',
                'answers' => [
                    '500',
                ],
                'note' => 'a generic error message, given when an unexpected condition was encountered and no more specific message is suitable.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Server Error: Not Implemented',
                'content' => 'Not Implemented',
                'answers' => [
                    '501',
                ],
                'note' => 'the server either does not recognize the request method, or it lacks the ability to fulfil the request. ',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Server Error: Bad Gateway',
                'content' => 'Bad Gateway',
                'answers' => [
                    '502',
                ],
                'note' => 'the server was acting as a gateway or proxy and received an invalid response from the upstream server.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Server Error: Service Unavailable',
                'content' => 'Service Unavailable',
                'answers' => [
                    '503',
                ],
                'note' => 'the server cannot handle the request (because it is overloaded or down for maintenance). Generally, this is a temporary state.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Server Error: Gateway Timeout',
                'content' => 'Gateway Timeout',
                'answers' => [
                    '504',
                ],
                'note' => 'the server was acting as a gateway or proxy and did not receive a timely response from the upstream server.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Informational: 100',
                'content' => '100',
                'answers' => [
                    'Continue',
                ],
                'note' => 'the server has received the request headers and the client should proceed to send the request body (in the case of a request for which a body needs to be sent; for example, a POST request). Sending a large request body to a server after a request has been rejected for inappropriate headers would be inefficient. To have a server check the request\'s headers, a client must send Expect: 100-continue as a header in its initial request and receive a 100 Continue status code in response before sending the body. ',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Informational: 101',
                'content' => '101',
                'answers' => [
                    'Switching Protocols',
                ],
                'note' => 'the requester has asked the server to switch protocols and the server has agreed to do so. ',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Success: 200',
                'content' => '200',
                'answers' => [
                    'OK',
                ],
                'note' => 'Standard response for successful HTTP requests',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Success: 201',
                'content' => '201',
                'answers' => [
                    'Created',
                ],
                'note' => 'the request has been fulfilled, resulting in the creation of a new resource.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Success: 202',
                'content' => '202',
                'answers' => [
                    'Accepted',
                ],
                'note' => 'the request has been accepted for processing, but the processing has not been completed. The request might or might not be eventually acted upon, and may be disallowed when processing occurs.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Success: 204',
                'content' => '204',
                'answers' => [
                    'Accepted',
                ],
                'note' => 'the server successfully processed the request, and is not returning any content.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Redirection: 301',
                'content' => '301',
                'answers' => [
                    'Moved Permanently',
                ],
                'note' => 'this and all future requests should be directed to the given URI',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Redirection: 304',
                'content' => '304',
                'answers' => [
                    'Not Modified',
                ],
                'note' => 'Indicates that the resource has not been modified since the version specified by the request headers If-Modified-Since or If-None-Match. ',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Redirection: 307',
                'content' => '307',
                'answers' => [
                    'Temporary Redirect',
                ],
                'note' => '',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: 400',
                'content' => '400',
                'answers' => [
                    'Bad Request',
                ],
                'note' => 'the server cannot or will not process the request due to an apparent client error (e.g. malformed request syntax, size too large)',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: 401',
                'content' => '401',
                'answers' => [
                    'Unauthorized',
                ],
                'note' => '',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: 403',
                'content' => '403',
                'answers' => [
                    '403',
                ],
                'note' => 'the request contained valid data and was understood by the server, but the server is refusing action due to the user having insufficient permissions',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: 404',
                'content' => '404',
                'answers' => [
                    'Not Found',
                ],
                'note' => 'the requested resource could not be found.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: 405',
                'content' => '405',
                'answers' => [
                    'Method Not Allowed',
                ],
                'note' => 'a request method is not supported for the requested resource; for example, a GET request on a form that requires data to be presented via POST, or a PUT request on a read-only resource.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: 406',
                'content' => '406',
                'answers' => [
                    'Not Acceptable',
                ],
                'note' => 'the requested resource is capable of generating only content not acceptable according to the Accept headers sent in the request.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: 408',
                'content' => '408',
                'answers' => [
                    'Request Timeout',
                ],
                'note' => 'the server timed out waiting for the request.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: 409',
                'content' => '409',
                'answers' => [
                    'Conflict',
                ],
                'note' => 'Indicates that the request could not be processed because of conflict in the current state of the resource, such as an edit conflict between multiple simultaneous updates',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Client Error: 418',
                'content' => '418',
                'answers' => [
                    "I'm a teapot",
                ],
                'note' => 'the RFC specifies this code should be returned by teapots requested to brew coffee. April Fools\' Joke',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => "Client Error: 451",
                'content' => "451",
                'answers' => [
                    'Unavailable For Legal Reasons',
                ],
                'note' => 'a server operator has received a legal demand to deny access to a resource or to a set of resources that includes the requested resource. The code 451 was chosen as a reference to the novel Fahrenheit 451.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Server Error: 500',
                'content' => '500',
                'answers' => [
                    'Internal Server Error',
                ],
                'note' => 'a generic error message, given when an unexpected condition was encountered and no more specific message is suitable.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Server Error: 501',
                'content' => '501',
                'answers' => [
                    'Not Implemented',
                ],
                'note' => 'the server either does not recognize the request method, or it lacks the ability to fulfil the request. ',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Server Error: 502',
                'content' => '502',
                'answers' => [
                    'Bad Gateway',
                ],
                'note' => 'the server was acting as a gateway or proxy and received an invalid response from the upstream server.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Server Error: 503',
                'content' => '503',
                'answers' => [
                    'Service Unavailable',
                ],
                'note' => 'the server cannot handle the request (because it is overloaded or down for maintenance). Generally, this is a temporary state.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
            [
                'name' => 'Server Error: 504',
                'content' => '504',
                'answers' => [
                    'Gateway Timeout',
                ],
                'note' => 'the server was acting as a gateway or proxy and did not receive a timely response from the upstream server.',
                'link' => 'https://en.wikipedia.org/wiki/List_of_HTTP_status_codes'
            ],
        ]
    ];
}