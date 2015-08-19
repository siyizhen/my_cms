<?php /* Smarty version 3.1.27, created on 2015-08-18 20:46:50
         compiled from "E:\Demo\my_web\admin\View\templates\index.html" */ ?>
<?php
/*%%SmartyHeaderCode:2717255d3293a237cf5_20245947%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c36d353eccf3c87ebea0c060e892a9c171832da' => 
    array (
      0 => 'E:\\Demo\\my_web\\admin\\View\\templates\\index.html',
      1 => 1438853256,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2717255d3293a237cf5_20245947',
  'variables' => 
  array (
    'web_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55d3293a291a97_78266500',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55d3293a291a97_78266500')) {
function content_55d3293a291a97_78266500 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2717255d3293a237cf5_20245947';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['web_title']->value;?>
</title>
<link href="admin/css/style.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
$(function(){
	//setMenuHeight
	$('.menu').height($(window).height()-51-27-26);
	$('.sidebar').height($(window).height()-51-27-26);
	$('.page').height($(window).height()-51-27-26);
	$('.page iframe').width($(window).width()-15-168);
	
	//menu on and off
	$('.btn').click(function(){
		$('.menu').toggle();
		
		if($(".menu").is(":hidden")){
			$('.page iframe').width($(window).width()-15+5);
			}else{
			$('.page iframe').width($(window).width()-15-168);
				}
		});
		
	//
	$('.subMenu a[href="#"]').click(function(){
		$(this).next('ul').toggle();
		return false;
		});

    $("#logout").click(function(){
        if(confirm("您确定要退出吗？")){
            return true;
        }else{
            return false;
        }
    });
})
<?php echo '</script'; ?>
>


</head>

<body>
<div id="wrap">
	<div id="header">
    <div class="logo fleft"></div>
    <div class="nav fleft">
    	<ul>
        	<div class="nav-left fleft"></div>
            <li class="first">我的面板</li>
        	<li>设置</li>
            <li>模块</li>
            <li>内容</li>
            <li>用户</li>
            <li>扩展</li>
            <li>应用</li>
            <div class="nav-right fleft"></div>
        </ul>
    </div>
    <a class="logout fright" href="admin_cadmin_mout.html" id="logout"> </a>
    <div class="clear"></div>
    <div class="subnav">
    	<div class="subnavLeft fleft"></div>
        <div class="fleft"></div>
        <div class="subnavRight fright"></div>
    </div>
    </div><!--#header -->
        <?php echo $_smarty_tpl->getSubTemplate ("left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <!--#content -->
    <div class="clear"></div>
    <div id="footer"></div><!--#footer -->
</div><!--#wrap -->
<div style="text-align:center;">
</div>
</body>
</html>
<?php }
}
?>