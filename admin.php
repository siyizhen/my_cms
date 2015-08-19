<?
    header("content-type:text/html; charset=utf-8");
    error_reporting(0);
    DEFINE("ADMIN_PATH",dirname(__FILE__));
    require ADMIN_PATH."/admin/admin_config.php";
    require ADMIN_PATH."/admin/wzl.class.php";
    date_default_timezone_set("PRC");
    session_start();
    WZL::run($config);