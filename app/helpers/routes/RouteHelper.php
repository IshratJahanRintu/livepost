<?php

namespace App\helpers\routes;


use RecursiveIteratorIterator;


class RouteHelper
{

    /**
     * @param $folder
     * @return void
     */
    public  static function includeRouteFiles($folder){
    $directoryIterator=new \RecursiveDirectoryIterator($folder);
        /**

         * @var RecursiveDirectoryIterator|RecursiveIteratorIterator $iterator

         */
    $iterator=new \RecursiveIteratorIterator($directoryIterator);
    while ($iterator->valid()){
       if(!$iterator->isDot()
           && $iterator->isFile()
           && $iterator->isReadable()
           && $iterator->current()->getExtension()==="php")
       {
           require $iterator->key();

       }
        $iterator->next();
    }
}
}
