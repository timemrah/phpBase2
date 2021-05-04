<?php
namespace layout\View;
use layout\View\Data\Head, layout\View\Data\Body;



class Data
{

    public $head, $body;

    public function __construct()
    {
        $this->head = new Head();
        $this->body = new Body();
    }


}