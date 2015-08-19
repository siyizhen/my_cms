<?php
/**
 * 
 * @authors siyizhen (1193814298@qq.com)
 * @date    
 * @version 
 */
    class DB{
        private static $db;

        /**
         * 实例化数据库
         * @param  string $dbtype 数据库类型
         * @param  array $config 数据库配置信息
         * @return [type]         
         */
        public static function init($dbtype,$config){
            self::$db=new $dbtype;
            self::$db->connect($config);
        }

        public static function query($sql){
            return self::$db->query($sql);
        }

        public static function insert($table,$arr){
            return self::$db->insert($table,$arr);
        }

        public static function delete($table,$where){
            return self::$db->delete($table,$where);
        }

        public static function update($table,$arr,$where){
            return self::$db->update($table,$arr,$where);
        }

        public static function fetchOne($sql){
            return self::$db->fetchOne($sql);
        }

        public static function fetchAll($sql){
            return self::$db->fetchAll($sql);
        }

        public static function getNum($sql){
            return self::$db->getNum($sql);
        }
    }