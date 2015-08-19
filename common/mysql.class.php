<?php
/**
 * 
 * @authors siyizhen (1193814298@qq.com)
 * @date    
 * @version 
 */
    class Mysql{
        /**
         * 抛出错误
         * @param  string $error 错误信息
         * @return [type]        
         */
        public function error($error){
            die('操作有误:'.$error);
        }

        /**
         * 执行sql语句
         * @param  string $sql sql
         * @return boolean      
         */
        public function query($sql){
            if(!$result=mysql_query($sql)){
                $this->error(mysql_error());
            }
            return $result;
        }

        /**
         * 连接数据库
         * @param  array $config 数据库配置信息
         * @return [type]         
         */
        public function connect($config){
            extract($config);
            if(!$con=mysql_connect($db_host,$db_username,$db_password)){
                $this->error(mysql_error());
                exit;
            }
            if(!mysql_select_db($db_name,$con)){
                $this->error(mysql_error());
                exit;
            }
            mysql_query('set names utf8');
        }

        /**
         * 添加操作
         * @param  string $table 表名
         * @param  array $arr   关联数组，传过来的数据
         * @return integer        
         */
        public function insert($table,$arr){
            //insert into students(``,``,``) values('','','');
            $keysArr=array();
            $valuesArr=array();
            foreach($arr as $key => $value){
                //应该先将$value转义再写入数据库，但封装了数据检测的函数，不再重复了
                $keysArr[]='`'.$key.'`';
                $valuesArr[]="'".$value."'";
            }
            $keysStr=implode(',',$keysArr);
            $valuesStr=implode(',',$valuesArr);
            $sql="INSERT INTO ".$table."(".$keysStr.") VALUES(".$valuesStr.")";
            if($this->query($sql)){
                return mysql_affected_rows();
            }
        }

        /**
         * 删除记录
         * @return integer 
         */
        public function delete($table,$where){
            $sql="DELETE FROM ".$table." WHERE ".$where;
            if($this->query($sql)){
                return mysql_affected_rows();
            }
        }

        /**
         * 更新操作
         * @param  string $table 表名
         * @param  array $arr   关联数组，传过来的数据
         * @param  string $where 条件
         * @return integer        
         */
        public function update($table,$arr,$where){
            //update student set  `name`='',`age`='' where id=3;
            foreach($arr as $key => $value){
                //同理应先转义，此处不重复了
                $keys_and_valuesArr[]="`".$key."`='".$value."'";
            }
            $keys_and_values=implode(',',$keys_and_valuesArr);
            $sql="UPDATE ".$table." SET ".$keys_and_values." WHERE ".$where;
            if($this->query($sql)){
                return mysql_affected_rows();
            }
        }

        /**
         * 获取一条记录
         * @param  string $sql sql语句
         * @return [type]      
         */
        public function fetchOne($sql){
            $result=$this->query($sql);
            $row=mysql_fetch_assoc($result);
            if($row){
                return $row;
            }else{
                return null;
            }
        }

        /**
         * 获取所有记录
         * @param  string $sql sql语句
         * @return [type]      
         */
        public function fetchAll($sql){
            $result=$this->query($sql);
            $rows=array();
            while(@$row=mysql_fetch_assoc($result)){
                $rows[]=$row;
            }
            if(count($rows)){
                return $rows;
            }else{
                return null;
            }
        }

        //获取记录总数
        public function getNum($sql){
            $result=$this->query($sql);
            return mysql_num_rows($result);
        }
    }