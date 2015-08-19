<?php
/**
 * 
 * @authors siyizhen (1193814298@qq.com)
 * @date    
 * @version 
 */
    class adminModel{
        private static $table='cx_user';
        /**
         * 检测管理员是否存在
         * @param  string $username 
         * @param  string $password 
         * @return integer or null           
         */
        public function checkLogin($username,$password){
            $sql="SELECT id,username,password FROM ".self::$table." WHERE `username`='".$username."' AND `password`='".$password."' LIMIT 1";
            $row=DB::fetchOne($sql);
            return $row;
        }
    }