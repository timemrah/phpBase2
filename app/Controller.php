<?php
namespace app;




abstract class Controller
{



    protected $sessionId = null;
    protected $View = null;




    public function __construct($param = null)
    {
        ob_start();

        //İSTENİYOR İSE OTURUM BAŞLATILIYOR
        if(CONFIG['session']){
            session_start([
                'cookie_lifetime' => CONFIG['session_lifetime'],
                'read_and_close' => CONFIG['session_read_and_close']
            ]);
        }


        //CODING:
        //prePrint(['CONTROLLER' => __METHOD__]);
        //CODING//

    }



    protected function adminPanelLayout(): \layout\adminPanel\View {

        require "./layout/adminPanel/View.php";
        return new \layout\adminPanel\View();

    }




    public function __destruct()
    {
        //CODING:
        //prePrint(['CONTROLLER' => __METHOD__]);
        //CODING//

        ob_end_flush();
    }




}