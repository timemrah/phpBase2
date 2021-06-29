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




function ns2dir($namespace){
    return str_replace('\\', '/', $namespace);
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




function getHostDir(){
    return pathinfo($_SERVER['PHP_SELF'])['dirname'];
}




function getURL():string{
    return $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}




function getBaseURL():string{
    $url = str_replace(HOST_DIR, '', $_SERVER['REQUEST_URI']);
    if(substr($url, -1) !== '/'){ $url .= '/'; }
    return $url;
}




function getBase():string{
    $base = pathinfo($_SERVER['SCRIPT_NAME'])['dirname'] . '/';
    if(strpos($base, '//') !== false){
        $base = str_replace('//', '/', $base);
    }
    return $base;
}




function redirectSSL(){
    $sslUrl = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: {$sslUrl}");
}