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
    protected array $app;




    public function __construct()
    {

    }




    public function setApp($app){
        $this->app = $app;
    }



    protected function callCss(){
        foreach ($this->call['css'] as $key => $css) {
            echo "<link rel='stylesheet' type='text/css' href='{$css}' />";
        }
    }
    protected function callJs(){
        foreach ($this->call['js'] as $key => $js) {
            echo "<script src='{$js}'></script>";
        }
    }


}