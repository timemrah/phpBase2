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


    public function setJs($keyValue){

        if(!is_array($keyValue)){
            $keyValue = [$keyValue];
        }

        foreach($keyValue as $key => $value){
            if(is_numeric($key)){
                $this->call['js'][] = $value;
                continue;
            }
            $this->call['js'][$key] = $value;
        }
    }


    public function setCss($keyValue){

        if(!is_array($keyValue)){
            $keyValue = [$keyValue];
        }

        foreach($keyValue as $key => $value){
            if(is_numeric($key)){
                $this->call['css'][] = $value;
                continue;
            }
            $this->call['css'][$key] = $value;
        }
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



    abstract protected function html();


}