<?php
/**
 * 
 * @authors siyizhen (1193814298@qq.com)
 * @date    
 * @version 
 */
    class systemController{
        //构造函数获取系统当前时间和管理员
        public function __construct(){
            require_once ADMIN_PATH.'/admin/common/common.php';
        }

        //网站基本信息第一层逻辑
        public function web_base_info(){
            if(empty($_POST['submit'])){
                $web_base_info_m=M('system');
                $row=$web_base_info_m->fetchInfo();
                VIEW::assign('web_name',$row['web_name']);
                VIEW::assign('web_extension',$row['web_extension']);
                VIEW::assign('content',$row['content']);
                VIEW::assign('web_logo',$row['web_logo']);
                VIEW::display('system/web_base_info.html');
            }else{
                $this->addOrEdit();
            }
        }

        //网站基本信息添加及删除逻辑
        public function addOrEdit(){
            if(empty($_POST['web_name'])){
                showMessage('网站名称不能为空！','admin_csystem_mweb_base_info.html');
            }else{
                $web_name=safeString($_POST['web_name']);
            }

            if(empty($_POST['web_extension'])){
                showMessage('网站扩展名不能为空！','admin_csystem_mweb_base_info.html');
            }else{
                $web_extension=safeString($_POST['web_extension']);
            }
            $content=safeString($_POST['content']);
            $type=safeString($_POST['type']);
            //实例化syste模型类
            $web_base_info_m=M('system');
            $action=$web_base_info_m->judge();

            if($action){
                //如果$action不为空,则表示为更新操作
                $this->update_base($web_base_info_m,$action,$web_name,$web_extension,$content,$type);
            }else{
                //如果为空，则表示为添加操作
                $this->insert_base($web_base_info_m,$action,$web_name,$web_extension,$content,$type);
            }
        }

        //网站基本信息的更新操作
        public function update_base($web_base_info_m,$action,$web_name,$web_extension,$content,$type){
            $file=$_FILES['logo'];
            $mes=upload($file);
            $row=$web_base_info_m->fetchInfo();
            $src_logo=$row['web_logo'];
            if(pathinfo($src_logo,PATHINFO_BASENAME) != pathinfo($mes,PATHINFO_BASENAME)){
                if(file_exists($src_logo)){
                    if(unlink($src_logo)){
                        $src_logo_state=true;
                    }else{
                        $src_logo_state=false;
                    }
                }else{
                    $src_logo_state=true;
                }
            }
            
            if($web_base_info_m->edit($web_name,$web_extension,$type,$content,$mes)){
                showMessage('修改成功！',"admin_csystem_mweb_base_info.html");
            }else{
                showMessage('修改失败！',"admin_csystem_mweb_base_info.html");
            }
        }

        //网站基本信息的添加操作
        public function insert_base($web_base_info_m,$action,$web_name,$web_extension,$content,$type){
            $file=$_FILES['logo'];
            $mes=upload($file);
            if(is_bool($mes)){
                showMessage('图片上传失败！',"admin_csystem_mweb_base_info.html");
            }
            if(is_numeric($mes)){
                showMessage('操作错误','admin_csystem_mweb_base_info.html');
            }

            if($web_base_info_m->add($web_name,$web_extension,$content,$type,$mes) ){
                showMessage('网站信息添加成功！',"admin_csystem_mweb_base_info.html");
            }else{
                showMessage('网站信息添加失败！',"admin_csystem_mweb_base_info.html");
            }
        }
    }