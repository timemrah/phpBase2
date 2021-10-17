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
     * sub ile belirtilen dosya yolu Route.php dosyası ile karşılanmaktadır.
     */



    /* Kontrol edilmesi gereken, kalan url parçası.
     * En başta göreceli URL'nin tamamı olur, rotalar bu değerin en başıyla eşleştikçe eşleşen parça
     * silindiği için kısalmaya başlar. */
    protected static $urlStep   = BASE_URL;

    //Bazı durumlarda pratik göreceli dosya yolu yazımı sağlamaktadır.
    protected static $dirMemory = '';

    /* Rotayla uyum sağlamış çalışması doğrulanmış rotaların url değerlerini tutan dizi.
     * Görüldü ki rota bir çatala girdiğinde ve o çatalın sonunda rota bulunamadığında çataldan geri çıkarken bu
     * parçaları $urlStep geri almak zorunda ki diğer çatalda rota kontrolleri tekrar bakılabilsin, rota aransın. */
    protected static $urlStepHistory = [];




    //Rota bulunduğunda App::run ile Controller çalıştıran metod
    /* sub ile run arasındaki en büyük fark!
     * sub metodu, aranılan $url değeri null iken urlStep değerine bakmaksızın rotayı
     * çalıştırır. run metodu bunu asla yapmaz, değer eşitliği olduğu sürece çalışır.*/
    public static function run($method, $url, $appDir, $appMethod){

        //Esnek yazım için
        if($url === '/'){ $url = null; }

        //SUNUCUYA GELEN İSTEĞİN METODU DOĞRU DEĞİLSE ROTAYI ATLA
        if( !self::methodIsCorrect($method) ){ return; }

        //ARANAN URL, MEVCUT ADRES BASAMAĞININ EN BAŞINDA DEĞİLSE BU ROTAYI ATLA
        if($url && strpos(self::$urlStep, $url) !== 0){ return; }

        $urlStepTest = str_replace($url, '', self::$urlStep);
        if(empty($urlStepTest) || (strlen($urlStepTest) === 1 && strpos($urlStepTest, '/') === 0)){

            self::$urlStep = str_replace($url, '', self::$urlStep);

            //Çalışan rotayı geçmiş kaydına ekleyelim. Nerde kullanacağımızı bilemiyoruz
            self::$urlStepHistory[] = [ 'type' => 'run', 'url' => $url, 'method' => $method];

            /* BELİRTİLEN DOSYA YOLU ESKİ DEĞERİN DEVAMI NİTELİĞİNDEYSE ESKİ DEĞERE EKLEME YAPARAK DOSYA YOLUNA BAK
               DEĞİLSE DİREK YAZILAN DOSYA YOLUNA BAK BU $appDir YAZIMINI KISALTMAKTADIR */
            if(strpos($appDir, './') === false){
                self::$dirMemory .= $appDir;
            } else{
                self::$dirMemory = $appDir;
            }

            //echo '--- RUN SUCCESS ---<br />';
            App::run(ns2dir(self::$dirMemory), $appMethod);

            //URL'ye tamamen bakıldıysa daha rota bakma
            if(empty(self::$urlStep)){
                prePrint(self::getUrlStepHistoryInfo());
                exit();
            }

        }

    }




    //Rota bulunduğunda bir alt rota gurubuna bakılmasını sağlayan metod.
    /* sub ile run arasındaki en büyük fark!
     * sub metodu, aranılan $url değeri null iken urlStep değerine bakmaksızın rotayı
     * çalıştırır. run metodu bunu asla yapmaz, değer eşitliği olduğu sürece çalışır.
     * Çünkü sub'ın görevi gelen isteği bir alt(iç) guruba yönlendirebilmektir. Oysa run'ın
     * görevi belirlenen hedef Controller'i çalıştırmaktır. Alt Controller veya rota sözkonusu değildir.*/
    public static function sub($url, $routeDir){


        //Esnek yazım için
        if($url === '/'){ $url = null; }

        //ARANAN URL, MEVCUT ADRES BASAMAĞININ EN BAŞINDA DEĞİLSE BU ROTAYI ATLA
        if($url && strpos(self::$urlStep, $url) !== 0){ return; }
        /* $url 'null' veya '' iken strpos her zaman veriyi ilk sırada bulduğunu söyler,
         * yani 0. indiste. */

        $urlStepTest = str_replace($url, '', self::$urlStep);
        if(empty($urlStepTest) || strpos($urlStepTest, '/') === 0 || $url === null){

            self::$urlStep = str_replace($url, '', self::$urlStep);

            //Çalışan rotayı geçmiş kaydına ekleyelim. Nerde kullanacağımızı bilemiyoruz
            self::$urlStepHistory[] = ['type' => 'sub', 'url' => $url];

            /* BELİRTİLEN DOSYA YOLU ESKİ DEĞERİN DEVAMI NİTELİĞİNDEYSE ESKİ DEĞERE EKLEME YAPARAK DOSYA YOLUNA BAK
               DEĞİLSE DİREK YAZILAN DOSYA YOLUNA BAK BU $routeDir YAZIMINI KISALTMAKTADIR */
            if(strpos($routeDir, './') === false){
                self::$dirMemory .= $routeDir;
            } else{
                self::$dirMemory = $routeDir;
            }

            //echo '--- SUB SUCCESS ---<br />';
            require_once self::$dirMemory . "/Route.php";

            //URL'ye tamamen bakıldıysa daha rota bakma
            /*if(empty(self::$urlStep)){
                exit();
            }*/
            //Bu görevi run üstlenmelidir.

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

        if($method === 'ANY') { return true; }
        if(is_string($method)){ return $_SERVER['REQUEST_METHOD'] === $method; }
        if(is_array($method)) { return in_array($_SERVER['REQUEST_METHOD'], $method); }

        return false;
    }




    //DEBUG
    public static function getUrlStepHistoryInfo($show = []):string{

        $type = $show['type'] ?? false;

        $returnString = '';

        foreach(self::$urlStepHistory as $urlStep){
            $returnString .= $urlStep['url'];
        }

        return $returnString;
    }


}