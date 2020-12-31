<?php

namespace App\Services;

class HtmlFormatter {

    private string $html = '';
    private string $indent = '    ';
    private array $stack = [];

    function __construct($indent = '    ') {
        $this->indent = $indent;
    }

    public function reset()
    {
        $this->html = '';
        $this->stack = [];
    }

    public function indent() {
        $this->html .= str_repeat($this->indent, count($this->stack));
    }

    public function push($element)     {
        $this->indent();
        $this->html .= "<$element>\n";
        $this->stack[] = $element;
    }

    public function pop() {
        $element = array_pop($this->stack);
        $this->indent();
        $this->html .= "</$element>\n";
    }

    public function format($input): string {
        $this->reset();
        $input = preg_replace('/\s/', '', $input);
        if ($input && preg_match_all('/<(\/?.*?)>/', $input, $elements)) {
            foreach ($elements[1] as $element) {
                if (strpos($element, '/') === 0) {
                    $this->pop();
                } else {
                    $this->push($element);
                }
            }
        }
        return $this->html;
    }
}