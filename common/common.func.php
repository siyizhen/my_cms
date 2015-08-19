<?php
/**
 * 
 * @authors siyizhen (1193814298@qq.com)
 * @date    
 * @version 
 */

    /**
     * 信息提示和页面跳转
     * @param  string $mes 信息
     * @param  string $url 跳转地址
     * @return       
     */
    function showMessage($mes,$url){
        echo "<script type='text/javascript'>alert('$mes');window.location.href='$url';</script>";
        exit;
    }

    /**
     * 获取当天星期的函数
     * @return string 
     */
    function getWeek(){
        $weekArr=array('日','一','二','三','四','五','六');
        return '星期'.$weekArr[date("w")];
    }

    /**
     * 转义要写入数据库的字符
     * @param  string $str 
     * @return string     
     */
    function safeString($str){
        if(get_magic_quotes_gpc()){
            return trim($str);
        }else{
             return mysql_real_escape_string(trim($str));
        }
    }

    /**
     * 单文件上传
     * @param  array  $file     文件信息数组
     * @param  string  $path     上传文件目录
     * @param  integer $maxSize  上传文件最大大小
     * @param  boolean $img_flag 是否判断是不是图片类型
     * @return string or boolean or integer            
     */
    function upload($file,$path='./admin/uploads',$maxSize=209715200,$img_flag=false){
        $fileName=$file['name'];
        $size=$file['size'];
        $tmp_name=$file['tmp_name'];
        $types=$file['type'];
        $error=$file['error'];
        $ext=pathinfo($fileName,PATHINFO_EXTENSION);
        $extArr=array('png','jpg','jpeg','gif','mp4');
        $uniName=date("Ymd").rand(100,9999999).pathinfo($fileName,PATHINFO_BASENAME);

        if($error == 0){
            if($size > $maxSize){
                $mes='文件超过了自定义设置大小';
                exit;
            }

            if(!is_uploaded_file($tmp_name)){
                $mes='文件不是通过HTTP POST方式上传的';
                exit;
            }

            if(!in_array($ext, $extArr)){
                $mes='文件类型不在自定义类型内';
                exit;
            }

            if($img_flag){
                if(!getimagesize($tmp_name)){
                    $mes='不是真正的图片';
                    exit;
                }
            }

            if(!file_exists($path)){
                mkdir($path,0777,true);
            }

            $destination=$path.'/'.$uniName;
            if(move_uploaded_file($tmp_name, $destination)){
                $mes=$destination;
            }else{
                $mes=null;
            }

            
        }else{
            $mes=$error;
        }
        return $mes;
    }

    //$pics=$_FILES['pic'];
    function getPics($pics){
        $pics1=array_filter($pics['name']);
        $pic_num=count($pics1);
        for($i=0;$i<$pic_num;$i++){
            $rows1[$i]['name']=$pics['name'][$i];
            $rows1[$i]['type']=$pics['type'][$i];
            $rows1[$i]['error']=$pics['error'][$i];
            $rows1[$i]['size']=$pics['size'][$i];
            $rows1[$i]['tmp_name']=$pics['tmp_name'][$i];
        }
        $rows1=array_filter($rows1);
        return $rows1;
    }