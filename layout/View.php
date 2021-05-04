<?php
namespace layout;
use layout\View\Data;



class View
{



    public Data $data;
    protected array $call = [
        'html' => [],
        'css'  => [],
        'js'   => []
    ];




    public function __construct($param = null)
    {
        $this->data = new Data();
    }




}