<?php
namespace app\adminPanel;




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

        //VIEW:
        $View = $this->View('adminPanel');

        $View->data['title']       = 'Admin Sayfa Başlığı';
        $View->data['description'] = 'Admin sayfası kısa açıklaması.';
        $View->data['user']        = 'Emrah Tunçel';
        $View->data['product']     = 'Gofret';

        $View->html();
        //VIEW//

    }




}