<?php /* Smarty version 3.1.27, created on 2015-08-18 20:46:47
         compiled from "E:\Demo\my_web\admin\View\templates\login.html" */ ?>
<?php
/*%%SmartyHeaderCode:479155d32937573503_82474771%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2841d9b8cb7430958ae09d6e38f05683f2130f1' => 
    array (
      0 => 'E:\\Demo\\my_web\\admin\\View\\templates\\login.html',
      1 => 1438907334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '479155d32937573503_82474771',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55d32937607c23_46303634',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55d32937607c23_46303634')) {
function content_55d32937607c23_46303634 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '479155d32937573503_82474771';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员登录</title>
<link href="admin/css/login.css" rel="stylesheet" type="text/css" />


</head>

<body>
<div id="wrap">
	<div id="header"> </div>
    <div id="content-wrap">
    	<div class="space"> </div>
   	  <form action="admin_cadmin_mlogin.html" method="post"><div class="content">
        <div class="field"><label>账　户：</label><input class="username" name="username" type="text" /></div>
		<div class="field"><label>密　码：</label><input class="password" name="password" type="password" /><br /></div>
        <!-- <div class="field"><label>验证码：</label><input class="password" name="" type="password" /><br /></div> -->
        <div class="btn"><input name="submit" type="submit" class="login-btn" value="" /></div>
      </div>

      </form>
    </div>
    <div id="footer"> </div>
</div>
</body>
</html>
<?php }
}
?>