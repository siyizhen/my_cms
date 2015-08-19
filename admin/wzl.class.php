<?php
/**
 * 
 * @authors siyizhen (1193814298@qq.com)
 * @date    
 * @version 
 */
    
require_once ADMIN_PATH.'/admin/function/func.inc.php';
require_once ADMIN_PATH.'/common/mysql.class.php';
require_once ADMIN_PATH.'/common/Smarty/Smarty.class.php';
require_once ADMIN_PATH.'/common/image.func.php';
require_once ADMIN_PATH.'/admin/core/DB.class.php';
require_once ADMIN_PATH.'/admin/core/VIEW.class.php';
require_once ADMIN_PATH.'/common/common.func.php';
 
 class WZL{
    private static $config;
    public static $controller;
    public static $method;

    /**
     * 初始化Mysql数据库
     * @return [type] [description]
     */
    private static function db_init(){
        DB::init('Mysql',self::$config['dbtype']);
    }

    /**
     * 初始化Smarty模板引擎
     * @return [type] [description]
     */
    private static function view_init(){
        VIEW::init('Smarty',self::$config['viewtype']);
    }

    /**
     * 初始化控制器
     * @return string 
     */
    private static function controller(){
        self::$controller=isset($_GET['controller'])?addslashes(trim($_GET['controller'])):'index';
        return self::$controller;
    }

    /**
     * 初始化控制器下方法
     * @return string 
     */
    private static function method(){
        self::$method=isset($_GET['method'])?addslashes(trim($_GET['method'])):'index';
        return self::$method;
    }

    /**
     * 启动引擎函数
     * @param  array $config 配置信息
     * @return [type]         
     */
    public static function run($config){
        self::$config=$config;
        self::db_init();
        self::view_init();
        self::$controller=self::controller();
        self::$method=self::method();
        C(self::$controller,self::$method);
    }




 }