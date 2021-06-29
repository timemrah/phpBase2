<?php
namespace app\basePanel;




class Controller extends \app\Controller
{


    public function __construct(array $app = [])
    {
        parent::__construct($app);
    }




    public function index(){

        $View = $this->View('adminPanel');
        $View->html();

    }


}