<?php
namespace app\adminPanel;




class Controller extends \app\Controller
{



    public function __construct($app = null)
    {
        parent::__construct($app);

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

        $View->body['title']       = 'Admin Sayfa Başlığı';
        $View->body['description'] = 'Admin sayfası kısa açıklaması.';
        $View->body['user']        = 'Emrah Tunçel';
        $View->body['product']     = 'Gofret';

        $View->html();
        //VIEW//

    }




    function dashboard(){

        //CODING:
        //prePrint(['CONTROLLER' => __METHOD__]);
        //CODING//

        //VIEW:
        $View = $this->View('adminPanel');

        $View->body['title']       = 'Dashboard';
        $View->body['description'] = 'Dashboard kısa açıklaması.';
        $View->body['user']        = 'Emrah Tunçel';
        $View->body['product']     = 'Gofret';

        $View->html();
        //VIEW//

    }




}