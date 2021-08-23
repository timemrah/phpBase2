<?php
namespace sys;


use layout\View;


class App
{



    public static function run($dir, $method){

        //UYGULAMA ÇALIŞTIRILMAK İÇİN HAZIRLANIYOR
        $appControllerDir  = $dir;
        $appControllerName = dir2ns($dir).'\\Controller';

        // Autoload işleminden sonra gereksiz kaldı :
        /*//DOSYA YOLU AĞACI PARÇALANIYOR
        $controllerDirParts = explode('/', unShiftTrim($appControllerDir, './'));
        $reqControllerDir   = '.';

        //TÜM DOSYA YOLU AĞACI CONTROLLER'LERİ DAHİL EDİLİYOR
        foreach($controllerDirParts as $controllerDirPart){
            $reqControllerDir .= "/$controllerDirPart";
            $controllerSrc     = "$reqControllerDir/Controller.php";
            if(file_exists($controllerSrc)){
                require_once $controllerSrc;
            }
        }*/
        // Autoload işleminden sonra gereksiz kaldı //

        //CONTROLLER ÇALIŞTIRILIYOR
        $Controller = new $appControllerName(compact(['dir', 'method']));

        //METOD ÇALIŞTIRILIYOR
        if($method){ return $Controller->$method(); }
        else       { return $Controller; }

    }




}