<?php


namespace app\error;


class Controller extends \app\Controller
{



    public function __construct($param = null)
    {
        parent::__construct($param);
    }




    function _404_(){

        header( "HTTP/1.1 404 Not Found" );
        prePrint(['CONTROLLER' => __METHOD__]);

    }




    function unauthorized(){

        prePrint(['CONTROLLER' => __METHOD__]);

    }




}