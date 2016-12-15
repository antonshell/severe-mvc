<?php

/**
 * Class ConfigManager
 */
class ConfigManager{

    /**
     * @return string
     */
    private static function getPath(){
        $path = __DIR__ . '/../config/config.php';
        return $path;
    }

    /**
     * @return array
     */
    public static function getConfig()
    {
        $path = self::getPath();
        return include $path;
    }

    /**
     *  @param array $arr
     *  @return mixed
     */
    public static function get($arr){
        $path = self::getPath();
        $config = include $path;

        foreach($arr as $section){
            if(isset($config[$section])){
                $config = $config[$section];
            }
            else{
                return null;
            }
        }

        return $config;
    }
}