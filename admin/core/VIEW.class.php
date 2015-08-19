<?php
/**
 * 
 * @authors siyizhen (1193814298@qq.com)
 * @date    
 * @version 
 */
    class VIEW{
        private static $view;

        /**
         * 实例化模板引擎
         * @param  string $viewtype 模板引擎类型
         * @param  array  $config   模板引擎的配置信息,必须为关联数组
         * @return [type]           [description]
         */
        public static function init($viewtype,$config){
            self::$view=new $viewtype;
            //此处为smartym模板引擎信息,格式为
            //$smarty->left_delimiter='{<';
            foreach($config as $key => $value){
                self::$view->$key=$value;
            }
        }

        /**
         * 实例化smarty模板引擎的分配
         * @param  [type] $name  [description]
         * @param  [type] $param [description]
         * @return [type]        [description]
         */
        public static function assign($name,$param){
            self::$view->assign($name,$param);
        }

        /**
         * 实例化smarty模板引擎的指定模板
         * @param  sting $templates 
         * @return             
         */
        public static function display($templates){
            self::$view->display($templates);
        }
    }