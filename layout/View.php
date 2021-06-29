<?php
namespace layout;


abstract class View
{

    public array $head = [
        'title' => '',
        'description' => ''
    ];
    public array $body = [
        'title'       => '',
        'description' => ''
    ];
    protected array $call = [
        'html' => [],
        'css'  => [],
        'js'   => []
    ];
    protected array $app;
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