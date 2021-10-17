<?php
namespace app\adminPanel\user;




class Controller extends \app\adminPanel\Controller
{



    public function __construct($param = null)
    {
        parent::__construct($param);

        //CODING:
        //prePrint(['CONTROLLER' => __METHOD__]);
        //CODING//
    }




    function index(){
        //CODING:
        //prePrint(['CONTROLLER' => __METHOD__]);
        //CODING//

        //VIEW:
        $View = $this->View();

        $View->body['title']       = 'Kullanıcılar';
        $View->body['description'] = 'Kullanıcılar sayfası kısa açıklaması.';
        $View->body['user']        = 'Emrah Tunçel';

        $View->html();
        //VIEW//
    }




    function detail(){
        //CODING:
        prePrint(['CONTROLLER' => __METHOD__]);
        //CODING//
    }



    function setDetail(){
        //CODING:
        prePrint(['CONTROLLER' => __METHOD__]);
        //CODING//
    }




    function create(){
        //CODING:
        //prePrint(['CONTROLLER' => __METHOD__]);
        //CODING//

        $View = $this->View();
        $View->body['title'] = users();
        $View->html();

    }




    function update(){
        //CODING:
        prePrint(['CONTROLLER' => __METHOD__]);
        //CODING//
    }




    function delete(){
        //CODING:
        prePrint(['CONTROLLER' => __METHOD__]);
        //CODING//
    }




}