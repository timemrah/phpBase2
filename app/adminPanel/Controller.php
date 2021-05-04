<?php
namespace app\adminPanel;
use app\adminPanel\View\index\View;





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
        require_once './layout/adminPanel/View.php';
        require_once './app/adminPanel/View/index/View.php';
        $View = new View();
        $View->data['title'] = 'Admin Sayfa Başlığı';
        $View->data['description'] = 'Admin sayfası kısa açıklaması.';
        $View->data['user'] = 'Emrah Tunçel';
        $View->data['product'] = 'Gofret';
        $View->print();
        //VIEW//

    }




}