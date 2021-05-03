<?php




function prePrint($value){

    if(empty($value)){ preDump($value); }
    else             { echo '<pre>' . print_r($value, true) . '</pre>'; }

}




function preDump($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}




function dir2ns($dir){

    if(strpos($dir, './') !== false){
        $dir = substr($dir,2);
    } else if(strpos($dir, '/') === 0){
        $dir = substr($dir,1);
    }
    $dir = str_replace('/', '\\', $dir);
    return $dir;

}



function unShiftTrim($str, $search){

    if(is_string($search)){
        $search = [$search];
    }

    foreach($search as $word){
        if(strpos($str, $word) === 0){
            return substr($str, strlen($word));
        }
    }


    return $str;
}




function getURL($hostDir){
    $url = str_replace($hostDir, '', $_SERVER['REQUEST_URI']);
    if(substr($url, -1) !== '/'){ $url .= '/'; }
    return $url;
}