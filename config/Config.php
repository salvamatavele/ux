<?php
/**
 * Base URL
 */
define('__URL__', 'http://localhost/ux');
/**
 * dominio
 */
define('_DOMIN_',$_SERVER["HTTP_HOST"]);
/**
 * Data base config
 */
define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "ux",
    "username" => "root",
    "passwd" => "root",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

/**
     * Email configuration
     */
    define('MAIL', [
        "host"=>"",
        "port"=>"",
        "user"=>"",
        "passwd"=>"c",
        "from_name"=>"",
        "from_email"=>""
    ]);
/**
 * Para acessar css e javascript e img
 * asset
 */
function asset(string $path): string
{
    return __URL__."/public/{$path}";
}


/**
 * Urls
 *
 * @param string $uri
 * @return string
 */
function url(string $uri = null): string
{
    if ($uri){
        return __URL__."/{$uri}";
    }
    return __URL__;
}

