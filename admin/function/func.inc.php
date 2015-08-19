<?php
/**
 * 
 * @authors siyizhen (1193814298@qq.com)
 * @date    
 * @version 
 */
    header('content-type:text/html; charset=utf-8');
    /**
     * 控制器统一入口
     * @param string $name   控制器名
     * @param string $method 该控制器下的方法名
     */
    function C($name,$method){
        $target_file=ADMIN_PATH.'/admin/Controller/'.$name.'Controller.class.php';
        if(!file_exists($target_file)){
            echo $name.'控制器文件不存在!';
            exit;
        }
        require_once($target_file);
        $target_c=$name.'Controller';
        if(!class_exists($target_c)){
            echo $name.'控制器不存在！';
            exit;
        }
        $controller=new $target_c;
        if(!method_exists($controller, $method)){
            echo $method.'方法不存在';
            exit;
        }
        $controller->$method();
        return $controller;
    }

    /**
     * 模型统一入口
     * @param string $name 模型名字
     */
    function M($name){
        $target_file=ADMIN_PATH.'/admin/Model/'.$name.'Model.class.php';
        if(!file_exists($target_file)){
            echo $name.'模型文件不存在！';
            exit;
        }
        require_once($target_file);
        $target_m=$name.'Model';
        if(!class_exists($target_m)){
            echo $name.'模型不存在';
            exit;
        }
        $model=new $target_m;
        return $model;
    }


?>


    
    