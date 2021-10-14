<?php
namespace app;




abstract class Controller
{



    protected $app = [];




    public function __construct(array $app = [])
    {
        ob_start();

        //İSTENİYOR İSE OTURUM BAŞLATILIYOR
        if(CONFIG['session']){
            session_start([
                'cookie_lifetime' => CONFIG['session_lifetime'],
                'read_and_close' => CONFIG['session_read_and_close']
            ]);
        }

        $this->app = $app;


        //CODING:
        //prePrint(['CONTROLLER' => __METHOD__]);
        //CODING//

    }




    protected function View($viewFileName = null){

        $appViewDir = "{$this->app['dir']}/View/{$this->app['method']}";

        /* Uygulamanın View klasöründeki çıktı sınıfı elle belirtilmiş ise elle belirtilen sınıfı, belirtilmemiş ise
         * varsayılan sınıf olan View sınıfını örnekleyelim. */
        $appViewClassName = $viewFileName
            ? dir2ns("{$appViewDir}/{$viewFileName}")
            : dir2ns("{$appViewDir}/View");

        $View = new $appViewClassName();
        $View->setApp($this->app);
        return $View;

    }




    public function setApp($dir, $method){

        $this->app['dir']    = $dir;
        $this->app['method'] = $method;

    }




    public function __destruct()
    {
        //CODING:
        //prePrint(['CONTROLLER' => __METHOD__]);
        //CODING//

        ob_end_flush();
    }




}