<?php


namespace app\frontFace;


class Controller extends \app\Controller
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

        $View = $this->View('adminPanel');

        $View->body['title']       = 'Public Sayfa Başlığı';
        $View->body['description'] = 'Public Anasayfa kısa açıklaması.';
        $View->body['user']        = 'Emrah Tunçel';
        $View->body['product']     = 'Test';

        $View->html();
    }

}