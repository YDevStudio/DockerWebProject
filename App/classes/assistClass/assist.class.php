<?php
class assist{
    public static function coder($email ,$id){
    $str = strrev($email) .'|'. strrev($id);
    $str = bin2hex($str);
    $str = bin2hex($str);
    return $str;
}
    public static  function incoder($code){
    $str = hex2bin($code);
    $str = hex2bin($str);
    $str = strrev($str);
    $str = explode('|',$str);
    return $str;
}
    public static function coderHasch($user , $pass){
        $code = self::coder($user,$pass);
        return 'admin';
    }
    
    public static function getCode(){
        return 'admin';
    }
}

?>