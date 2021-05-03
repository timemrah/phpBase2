<?php


namespace app\frontFace;


class Controller extends \app\Controller
{


    public function __construct($param = null)
    {
        parent::__construct($param);
    }


    function index(){
        //CODING:
        prePrint(['CONTROLLER' => __METHOD__]);
        //CODING//
    }

}