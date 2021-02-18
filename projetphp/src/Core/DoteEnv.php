<?php

namespace App\Core;


//permet de retrouver URL/route

class DoteEnv{
    static public function load():void {
        
        $file = file(__DIR__.'/../../.env',FILE_IGNORE_NEW_LINES);  
        // echo '<pre>'; var_dump($file);echo '</pre>';exit;
        array_map(function($line){
            $result = explode('=',$line);
            $_ENV[$result[0]] = $result[1];
        },$file);

    }
}