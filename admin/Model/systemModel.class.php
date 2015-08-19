<?php
/**
 * 
 * @authors siyizhen (1193814298@qq.com)
 * @date    
 * @version 
 */
class systemModel{
    private static $table='cx_webedit';
    /**
     * 判断当前操作为添加还是修改
     * @return array or null
     */
    public function judge(){
        $sql="SELECT id,type FROM ".self::$table." WHERE `type`='web_base_info' LIMIT 1";
        $row=DB::fetchOne($sql);
        return $row;
    }

    /**
     * 添加网站基本信息
     * @param string $web_name      
     * @param string $web_extension 
     * @param string $content       
     */
    public function add($web_name,$web_extension,$content,$type,$mes){
        $arr['web_name']=$web_name;
        $arr['web_extension']=$web_extension;
        $arr['content']=$content;
        $arr['type']=$type;
        $arr['web_logo']=$mes;
        return DB::insert(self::$table,$arr);
    }


    /**
     * 更新网站基本操作
     * @param  string $web_name      
     * @param  string $web_extension 
     * @param  string $type          
     * @param  string $content       
     * @param  string $mes           
     * @return boolean or null                
     */
    public function edit($web_name,$web_extension,$type,$content,$mes){
        $arr['web_name']=$web_name;
        $arr['web_extension']=$web_extension;
        $arr['content']=$content;
        $arr['web_logo']=$mes;
        return DB::update(self::$table,$arr," type='$type'");
    }

    /**
     * 得到网站的基本信息
     * @return array or null
     */
    public function fetchInfo(){
        $sql="SELECT web_name,web_extension,content,web_logo FROM ".self::$table." WHERE `type`='web_base_info' LIMIT 1";
        return DB::fetchOne($sql);
    }
}