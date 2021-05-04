<?php
namespace layout;


class View
{



    public array $data = [
        'headTitle' => '',
        'headDescription' => '',
        'title'       => '',
        'description' => ''
    ];
    protected array $call = [
        'html' => [],
        'css'  => [],
        'js'   => []
    ];




    public function __construct($param = null)
    {

    }




}