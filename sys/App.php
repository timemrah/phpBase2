<?php
namespace sys;




class App
{



    public static function run($dir, $method){
        //UYGULAMA ÇALIŞTIRILMAK İÇİN HAZIRLANIYOR
        $appControllerDir  = $dir;
        $appControllerName = dir2ns($dir).'\\Controller';
        $appMethodName     = $method;

        //DOSYA YOLU AĞACI PARÇALANIYOR
        $controllerDirParts = explode('/', unShiftTrim($appControllerDir, './'));
        $reqControllerDir = '.';

        //TÜM DOSYA YOLU AĞACI CONTROLLER'LERİ DAHİL EDİLİYOR
        foreach($controllerDirParts as $controllerDirPart){
            $reqControllerDir .= "/$controllerDirPart";
            $controllerSrc = "$reqControllerDir/Controller.php";
            if(file_exists($controllerSrc)){
                require_once $controllerSrc;
            }
        }

        //CONTROLLER ÇALIŞTIRILIYOR
        $Controller = new $appControllerName();



        //METOD ÇALIŞTIRILIYOR
        if($appMethodName){ return $Controller->$appMethodName(); }
        else              { return $Controller; }

    }




}