<?php
namespace layout;


abstract class View
{

    public $head = [
        'title' => '',
        'description' => ''
    ];
    public $body = [
        'title'       => '',
        'description' => ''
    ];
    protected $call = [
        'html' => [],
        'css'  => [],
        'js'   => []
    ];
    protected $app;
    protected $appViewDir;




    public function setApp($app){
        $this->app = $app;
        $this->appViewDir = "{$this->app['dir']}/View/{$this->app['method']}";
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



    protected function html(){}


}