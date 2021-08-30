<?php
namespace sys;




class Route
{



    /* AÇIKLAMA:
     * Route gelen URL isteklerine karşı istenen Controller sınıfını çalıştırır.
     * Buradaki rota yaklaşımı adım adım çalıştırmadır. Yani rotanın tamamı bir Route ile
     * belirtilmek zorunda değildir.
     * Rotada belirtilen URL değeri adres satırındaki URL değerinin en başında varsa rota çalışır.
     * Bu adımdan sonra çalışan rota URL değeri adres satırındaki URL değerinden silinir ve
     * bir sonraki rota okumasına aktarılır. Bu şekilde iç içe ilerlemeli bir şekilde rotalama
     * yapılabilmektedir.
     * Bu iç içe parçalı rota atamaları Controller'lar içerisinde dahi rotaların yazımına imkan
     * vermektedir ancak uygun kullanımın rotalara özgü bir dosya oluşturulmasıyla olduğu kanaat
     * getirilmiştir.
     * Bu sebeple iç içe geçmiş rota parçaları sub metodu ile belirtilmekte ve her
     * sub ile belirtilen dosya yolu Route.php dosyası ile karşılanaktadır.
     */




    protected static $urlStep   = BASE_URL;
    protected static $dirMemory = '';
    //urlMemory;




    private static function run($method, $url, $appDir, $appMethod = null){

        if(empty(self::$urlStep)){ exit(); }

        /*prePrint([
            'urlStep'   => self::$urlStep,
            'url'       => URL,
            'appDir'    => $appDir,
            'appMethod' => $appMethod,
        ]);*/

        //SUNUCUYA GELEN İSTEĞİN METODU DOĞRU DEĞİLSE ROTAYI ATLA
        if( !self::methodIsCorrect($method) ){ return; }


        //ADRES BASAMAĞINDA BELİRTİLEN $url DEĞERİ YOKSA ROTAYI ATLA
        if(strpos(self::$urlStep, $url) !== 0){ return; }

        $urlStepTest = str_replace($url, '', self::$urlStep);
        if(empty($urlStepTest) || strpos($urlStepTest, '/') === 0){
            self::$urlStep = str_replace($url, '', self::$urlStep);

            /* BELİRTİLEN DOSYA YOLU ESKİ DEĞERİN DEVAMI NİTELİĞİNDEYSE
               ESKİ DEĞERE EKLEME YAPARAK DOSYA YOLUNA BAK
               DEĞİLSE DİREK YAZILAN DOSYA YOLUNA BAK
               BU $appDir YAZIMINI KISALTMAKTADIR */
            if(strpos($appDir, './') === false){
                self::$dirMemory .= $appDir;
            } else{
                self::$dirMemory = $appDir;
            }

            App::run(ns2dir(self::$dirMemory), $appMethod);
            exit();
        }

    }




    public static function sub($url, $routeDir){
        prePrint('1');
        if(empty(self::$urlStep)){ exit(); }
        prePrint('2');

        //ADRES BASAMAĞINDA BELİRTİLEN $url DEĞERİ YOKSA ROTAYI ATLA
        if(strpos(self::$urlStep, $url) !== 0){ return; }
        prePrint('3');

        $urlStepTest = str_replace($url, '', self::$urlStep);
        if(empty($urlStepTest) || strpos($urlStepTest, '/') === 0 || $url === null){
            self::$urlStep = str_replace($url, '', self::$urlStep);

            /* BELİRTİLEN DOSYA YOLU ESKİ DEĞERİN DEVAMI NİTELİĞİNDEYSE
               ESKİ DEĞERE EKLEME YAPARAK DOSYA YOLUNA BAK
               DEĞİLSE DİREK YAZILAN DOSYA YOLUNA BAK
               BU $routeDir YAZIMINI KISALTMAKTADIR */
            if(strpos($routeDir, './') === false){
                self::$dirMemory .= $routeDir;
            } else{
                self::$dirMemory = $routeDir;
            }

            require_once self::$dirMemory . "/Route.php";
            exit();
        }
    }




    public static function get($url, $appMethod, $appDir = null){
        self::run('GET', $url, $appDir, $appMethod);
    }
    public static function post($url, $appMethod, $appDir = null){
        self::run('POST', $url, $appDir, $appMethod);
    }
    public static function put($url, $appMethod, $appDir = null){
        self::run('PUT', $url, $appDir, $appMethod);
    }
    public static function del($url, $appMethod, $appDir = null){
        self::run('DELETE', $url, $appDir, $appMethod);
    }
    public static function any($url, $appMethod, $appDir = null){
        self::run('ANY', $url, $appDir, $appMethod);
    }






    private static function methodIsCorrect($method): bool {
        return ($method === 'ANY' || $_SERVER['REQUEST_METHOD'] === $method);
    }
}