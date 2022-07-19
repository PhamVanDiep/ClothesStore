<?php
    session_start();
    if(!defined("ROOT")) define("ROOT", dirname(dirname(__FILE__)));
    define("URL",' http://localhost/web/ClothesStore/');
    define("DB_HOST", 'localhost');
    define("DB_USER",'root');
    define("DB_PASS",'');
    define("DB_NAME",'clothes_store');
    if(!defined("DS")) define('DS', '/');
    define("DB_PORT", '3306');
