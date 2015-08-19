<?php
/**
 * 
 * @authors siyizhen (1193814298@qq.com)
 * @date    
 * @version 
 */
    class adminController{

        //登录第一层逻辑
        public function login(){
            if(!isset($_POST['submit'])){
                VIEW::display('login.html');
            }else{
                $this->checkLogin();
            }
        }

        /**
         * 校验用户名和密码是否正确
         * @return [type] 
         */
        public function checkLogin(){
            if(empty($_POST['username'])){
                showMessage('用户名不能为空！',"admin_cadmin_mlogin.html");
            }else{
                $username=addslashes(trim($_POST['username']));
            }

            if(empty($_POST['password'])){
                showMessage('密码不能为空！',"admin_cadmin_mlogin.html");
            }else{
                $password=addslashes(trim($_POST['password']));
            }

            $admin_m=M('admin');
            if($row=$admin_m->checkLogin($username,$password)){
                $_SESSION['admin_id']=$row['id'];
                $_SESSION['admin_name']=$row['username'];
                showMessage('登录成功！','admin_cindex_mindex.html');
            }else{
                showMessage('用户名或密码错误！','admin_cadmin_mlogin.html');
            }
        }


        public function out(){
            $_SESSION=array();
            // if(!isset($_COOKIE['admin_name'])){
            //     setcookie("admin_name","",time()-1);
            // }
            // if(!isset($_COOKIE['admin_id'])){
            //     setcookie("admin_id","",time()-1);
            // }
            session_destroy();
            showMessage('退出成功！',"admin_cadmin_mlogin.html");
        }

    }

?>