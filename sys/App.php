<?php namespace sys;




class App
{



    public static function run($dir, $method){

        //UYGULAMA ÇALIŞTIRILMAK İÇİN HAZIRLANIYOR
        $appControllerName = dir2ns($dir).'\\Controller';

        //CONTROLLER ÇALIŞTIRILIYOR
        $Controller = new $appControllerName(compact(['dir', 'method']));

        //METOD ÇALIŞTIRILIYOR
        if($method){ return $Controller->$method(); }
        else       { return $Controller; }

    }




}