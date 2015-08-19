<?php
/**
 * 
 * @authors siyizhen (1193814298@qq.com)
 * @date    
 * @version 
 */
    class indexController{

        public function __construct(){
            if(empty($_SESSION['admin_id']) && empty($_COOKIE['admin_id']) && WZL::$method != 'login'){
                VIEW::display('login.html');
                exit;
            }
            require_once ADMIN_PATH.'/admin/common/common.php';
        }

        /**
         * 登录后显示首页
         * @return  
         */
        public function index(){
            $web_base_info_m=M('system');
            $row=$web_base_info_m->fetchInfo();
            $web=$row['web_name'];
            $extention=$row['web_extension'];
            $web_title=$web.'_'.$extention;
            VIEW::assign('web_title',$web_title);
            VIEW::assign('web',$web);
            VIEW::display('index.html');
        }
        
        /**
         * 登录后显示首页欢迎语
         * @return  
         */
        public function welcome(){
            VIEW::display('welcome.html');
        }


        
    }
?>