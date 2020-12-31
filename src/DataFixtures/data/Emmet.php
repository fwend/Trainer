<?php

namespace App\DataFixtures\data;

class Emmet
{
    public static string $name = 'Emmet';

    public static array $data = [
        'html' => [
            [
                'name' => 'Input text',
                'content' => '<input type="text" name="" id="">',
                'answers' => [
                    'inp',
                    'input:text'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/'
            ],
            [
                'name' => 'Child >',
                'content' => '<nav><ul><li></li></ul></nav>',
                'answers' => [
                    'nav>ul>li'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
                'format' => true
            ],
            [
                'name' => 'Multiplication *',
                'content' => '<ul><li></li><li></li><li></li></ul>',
                'answers' => [
                    'ul>li*3'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
                'format' => true
            ],
            [
                'name' => 'Sibling: +',
                'content' => '<div></div><p></p><blockquote></blockquote>',
                'answers' => [
                    'div+p+bq'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
                'format' => true
            ],
            [
                'name' => 'Attributes',
                'content' => '<div id="header" class="btn"></div>',
                'answers' => [
                    '#header.btn'
                ],
                'note' => 'div is default',
                'link' => 'https://docs.emmet.io/cheat-sheet/'
            ],
            [
                'name' => 'Custom attributes',
                'content' => '<p title="Hello world"></p>',
                'answers' => [
                    'p[title="Hello world"]'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/'
            ],
            [
                'name' => 'Implicit tag names 1',
                'content' => '<em><span class="class"></span></em>',
                'answers' => [
                    'em>.class'
                ],
                'note' => 'span is inserted because em is an inline element',
                'link' => 'https://docs.emmet.io/cheat-sheet/'
            ],
            [
                'name' => 'Implicit tag names 2',
                'content' => '<ul><li class="class"></li></ul>',
                'answers' => [
                    'ul>.class'
                ],
                'note' => 'li is inserted because ul is the parent element',
                'link' => 'https://docs.emmet.io/cheat-sheet/'
            ],
            [
                'name' => 'Grouping 1',
                'content' => '<div><header><ul><li></li><li></li></ul></header><footer><p></p></footer></div>',
                'answers' => [
                    'ul>.class'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
                'format' => true
            ],
            [
                'name' => 'Grouping 2',
                'content' => '<div><dl><dt></dt><dd></dd><dt></dt><dd></dd><dt></dt><dd></dd></dl></div><footer><p></p></footer>',
                'answers' => [
                    '(div>dl>(dt+dd)*3)+footer>p'
                ],
                'note' => 'An entire group can be multiplied',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
                'format' => true
            ],
            [
                'name' => 'Html 5 document',
                'content' => 'Create a html 5 skeleton document',
                'answers' => [
                    '!',
                    'html:5'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
            ],
            [
                'name' => 'Anchor',
                'content' => '<a href=""></a>',
                'answers' => [
                    'a'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
            ],
            [
                'name' => 'Break',
                'content' => '<br />',
                'answers' => [
                    'br'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
            ],
            [
                'name' => 'Css link',
                'content' => '<link rel="stylesheet" href="" />',
                'answers' => [
                    'link'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
            ],
            [
                'name' => 'Script tag',
                'content' => '<script src=""></script>',
                'answers' => [
                    'script:src'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
            ],
            [
                'name' => 'Image tag',
                'content' => '<img src="" alt="" />',
                'answers' => [
                    'img'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
            ],
            [
                'name' => 'Iframe',
                'content' => '<iframe src=""></iframe>',
                'answers' => [
                    'iframe',
                    'ifr',
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
            ],
            [
                'name' => 'Form input',
                'content' => '<input type="email" name="" id="" />',
                'answers' => [
                    'input:email'
                ],
                'note' => 'Also: hidden, search, password, date, datetime, week, month, tel, number, color, range, file, submit, image, button, reset',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
            ],
            [
                'name' => 'Form checkbox',
                'content' => '<input type="checkbox" name="" id="" />',
                'answers' => [
                    'input:c',
                    'input:checkbox',
                ],
                'note' => 'Also :b (button), :f (file), :i (image), :s (submit), :r (radio)',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
            ],
            [
                'name' => 'Form radio',
                'content' => '<input type="radio" name="" id="" />',
                'answers' => [
                    'input:r',
                    'input:radio',
                ],
                'note' => 'Also :b (button), :f (file), :i (image), :s (submit), :c (checkbox)',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
            ],
            [
                'name' => 'Form select',
                'content' => '<select name="" id=""></select>',
                'answers' => [
                    'select',
                ],
                'note' => 'Also opt, for instance: "select>opt*3"',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
            ],
            [
                'name' => 'Form textarea',
                'content' => '<textarea name="" id="" cols="30" rows="10"></textarea>',
                'answers' => [
                    'textarea',
                    'tarea'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
            ],
            [
                'name' => 'Form submit button',
                'content' => '<button type="submit"></button>',
                'answers' => [
                    'button:submit',
                    'button:s',
                    'btn:s',
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
            ],
            [
                'name' => 'Various abbreviations',
                'content' => '<section></section>',
                'answers' => [
                    'section',
                    'sect',
                ],
                'note' => 'Also: leg, art, hdr, ftr, str',
                'link' => 'https://docs.emmet.io/cheat-sheet/',
            ],
        ],
        'css' => [
            [
                'name' => 'Display block',
                'content' => 'display:block;',
                'answers' => [
                    'd',
                    'd:b'
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/'
            ],
            [
                'name' => 'Display flex',
                'content' => 'display:flex;',
                'answers' => [
                    'd:f'
                ],
                'note' => 'Also: d:i (inline), d:ib (inline-block), d:n (none)',
                'link' => 'https://docs.emmet.io/cheat-sheet/'
            ],
            [
                'name' => 'Overflow hidden',
                'content' => 'overflow: hidden;',
                'answers' => [
                    'ov',
                    'ov:h'
                ],
                'note' => 'Also ov:v (visible), ov:s (scroll), ov:a (auto)',
                'link' => 'https://docs.emmet.io/cheat-sheet/'
            ],
            [
                'name' => 'Visibility hidden',
                'content' => 'visibility: hidden;',
                'answers' => [
                    'v',
                    'v:h'
                ],
                'note' => 'Also v:v (visible), v:c (collapse)',
                'link' => 'https://docs.emmet.io/cheat-sheet/'
            ],
            [
                'name' => 'Position',
                'content' => 'position:relative;',
                'answers' => [
                    'pos',
                    'pos:r'
                ],
                'note' => 'Also: pos:a, pos:f',
                'link' => 'https://docs.emmet.io/cheat-sheet/'
            ],
            [
                'name' => 'Cursor',
                'content' => 'cursor:pointer;',
                'answers' => [
                    'cur:p',
                ],
                'note' => '',
                'link' => 'https://docs.emmet.io/cheat-sheet/'
            ],
        ],
    ];
}