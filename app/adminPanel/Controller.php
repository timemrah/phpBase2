<?php
namespace app\adminPanel;
use layout\adminPanel\View;




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

        $View = $this->adminPanelLayout();
        $View->html();

    }




}