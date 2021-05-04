<?php
namespace layout\View\Data;




class Head
{

    public string $title = '';


    public function __construct()
    {

    }


    public function setTitle($title){
        $this->title = $title;
    }


    public function add2Title($value, $separator = '|', $position = 'prefix'){

        switch($position){
            case "prefix":
                $this->title = "{$value}{$separator}{$this->title}";
                break;
            case "suffix":
                $this->title .= "{$separator}{$value}";
                break;
        }

    }


}