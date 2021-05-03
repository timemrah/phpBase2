<?php
namespace app;



abstract class Controller
{



    public function __construct($param = null)
    {
        //CODING:
        prePrint(['CONTROLLER' => __METHOD__]);
        //CODING//
    }




}