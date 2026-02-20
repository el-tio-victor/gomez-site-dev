<?php
class MyHelpers{
    protected static $img_types    = ['jpg','png'];
    protected static $video_types  = ['mp4','wmv'];
    
    public static function saludo(){
        $msg = 'Que pedo perro';
        return $msg;
    }
    
    public static function versionAuto( $url ){
        $path       = pathinfo( $url );
        $version    = '?v='.filemtime($_SERVER['DOCUMENT_ROOT'].$url);
        return $path['dirname'].'/'.$path['basename'].$version; 
    }    
    /*
     * Determi no si es imágen o video
     * @var name nombre del archivo incluye extensión
     * @return mixed 
     * */
    public static function typeFile( $name ){
        $name_explode   = explode('.', $name ); 
        $mime           = end( $name_explode ); 

        if( in_array($mime, self::$img_types) ){
            return 'image';
        }
        else if( in_array( $mime, self::$video_types ) ){
            return 'video'; 
        }
        else{
            return false;
        }
    }

}
