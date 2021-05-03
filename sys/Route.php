<?php
namespace sys;




class Route
{



    /* AÇIKLAMA:
     * Route gelen URL isteklerine karşı istenen Controller sınıfını çalıştırır.
     * Rotalama nodeJs'deki Express kütüphanesine benzer.
     * Sistem index.php sayfasında başlar ve ilk rotalar burada belirtilir.
     * Rotada belirtilen URL değeri adres satırının en başında varsa rota çalışır.
     * Bu adımdan sonra çalışan rota url'si adres satırındaki değerden silinir ve
     * bir sonraki rota okumasına aktarılır. Bu şekilde iç içe ilerlemeli bir şekilde
     * Controller'lar içerisinde dahi rotalar yazılabilmektedir.
     */




    protected static $urlStep = URL;




    private static function run($method, $url, $appDir, $appMethod = null){

        if(empty(self::$urlStep)){ exit(); }

        /*prePrint([
            'urlStep'   => self::$urlStep,
            'url'       => URL,
            'appDir'    => $appDir,
            'appMethod' => $appMethod,
        ]);*/

        //METHOD DOĞRU DEĞİLSE ROTAYI ATLA
        if($method !== 'ANY' && $_SERVER['REQUEST_METHOD'] !== $method){ return; }


        //ADRES BASAMAĞINDA BELİRTİLEN $url DEĞERİ YOKSA ROTAYI ATLA
        if(strpos(self::$urlStep, $url) !== 0){ return; }

        $urlStepTest = str_replace($url, '', self::$urlStep);
        if(empty($urlStepTest) || strpos($urlStepTest, '/') === 0){
            //prePrint(['run' => 'success']);
            self::$urlStep = str_replace($url, '', self::$urlStep);
            App::run(ns2dir($appDir), $appMethod);
            exit();
        }

    }




    public static function sub($url, $routeDir){
        if(empty(self::$urlStep)){ exit(); }

        /*prePrint([
            'urlStep'  => self::$urlStep,
            'url'      => URL,
            'routeDir' => $routeDir,
        ]);*/

        //ADRES BASAMAĞINDA BELİRTİLEN $url DEĞERİ YOKSA ROTAYI ATLA
        if(strpos(self::$urlStep, $url) !== 0){ return; }

        $urlStepTest = str_replace($url, '', self::$urlStep);
        if(empty($urlStepTest) || strpos($urlStepTest, '/') === 0){
            //prePrint(['sub' => 'success']);
            self::$urlStep = str_replace($url, '', self::$urlStep);
            require_once "$routeDir/Route.php";
            exit();
        }
    }




    public static function get($url, $appDir, $appMethod){
        self::run('GET', $url, $appDir, $appMethod);
    }
    public static function post($url, $appDir, $appMethod){
        self::run('POST', $url, $appDir, $appMethod);
    }
    public static function put($url, $appDir, $appMethod){
        self::run('PUT', $url, $appDir, $appMethod);
    }
    public static function del($url, $appDir, $appMethod){
        self::run('DELETE', $url, $appDir, $appMethod);
    }
    public static function any($url, $appDir, $appMethod){
        self::run('ANY', $url, $appDir, $appMethod);
    }




}