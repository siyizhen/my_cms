<?php /* Smarty version 3.1.27, created on 2015-08-18 20:46:50
         compiled from "E:\Demo\my_web\admin\View\templates\header.html" */ ?>
<?php
/*%%SmartyHeaderCode:904355d3293a5933c6_46155943%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f68a6b8d0bd6e851b6368df5422635e114a626f' => 
    array (
      0 => 'E:\\Demo\\my_web\\admin\\View\\templates\\header.html',
      1 => 1439342320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '904355d3293a5933c6_46155943',
  'variables' => 
  array (
    'web_title' => 0,
    'admin_name' => 0,
    'date' => 0,
    'week' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55d3293a5c6052_10407481',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55d3293a5c6052_10407481')) {
function content_55d3293a5c6052_10407481 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '904355d3293a5933c6_46155943';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['web_title']->value;?>
</title>
<link href="admin/css/style.css" rel="stylesheet" type="text/css" />
<!-- kindeditor部分样式和js -->
<link rel="stylesheet" href="admin/kindeditor/themes/default/default.css" />
		<?php echo '<script'; ?>
 charset="utf-8" src="admin/kindeditor/kindeditor-min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 charset="utf-8" src="admin/kindeditor/lang/zh_CN.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					allowFileManager : true
				});
			});
		<?php echo '</script'; ?>
>
<!-- kindeditor部分结束 -->






<style type="text/css">
body {
    background:#FFF
}
</style>
</head>

<body>
<div id="contentWrap">
  <div class="pageTitle">用户:<?php echo $_smarty_tpl->tpl_vars['admin_name']->value;?>
&nbsp;&nbsp;时间:<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['week']->value;?>
</div><?php }
}
?>