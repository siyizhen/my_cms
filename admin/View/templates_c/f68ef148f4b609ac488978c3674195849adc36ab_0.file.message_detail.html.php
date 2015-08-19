<?php /* Smarty version 3.1.27, created on 2015-08-19 21:00:48
         compiled from "E:\Demo\my_web\admin\View\templates\message\message_detail.html" */ ?>
<?php
/*%%SmartyHeaderCode:3027455d47e002ec694_29874628%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f68ef148f4b609ac488978c3674195849adc36ab' => 
    array (
      0 => 'E:\\Demo\\my_web\\admin\\View\\templates\\message\\message_detail.html',
      1 => 1439989246,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3027455d47e002ec694_29874628',
  'variables' => 
  array (
    'messageOne' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55d47e003619b3_82616874',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55d47e003619b3_82616874')) {
function content_55d47e003619b3_82616874 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3027455d47e002ec694_29874628';
echo $_smarty_tpl->getSubTemplate ("../header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<style type="text/css">
  .content_left{
    border: 1px solid #e6e6e6; 
    width: 80px; 
    line-height:500px; 
    height: 500px; 
    font-weight: bolder; 
    text-align: center;
    float: left;
  }
  .content_right{
    width: 1000px;
    height: 500px;
    border: 1px solid #e6e6e6;
    float: left;
  }
</style>
  <div class="pageColumn" style="margin-bottom: 20px;">
  <div class="pageButton main_info">
     <span style="color:red; font-weight: bolder;"><?php echo $_smarty_tpl->tpl_vars['messageOne']->value['name'];?>
</span>&nbsp;的详细留言信息
  </div>
             <div class="form">姓名：<?php echo $_smarty_tpl->tpl_vars['messageOne']->value['name'];?>
</div>
             <div class="form">留言主题：<?php echo $_smarty_tpl->tpl_vars['messageOne']->value['title'];?>
</div>
             <div>
                <div class="leftstyle">留言内容：</div>
                <div class="rightstyle"><?php echo $_smarty_tpl->tpl_vars['messageOne']->value['content'];?>
</div>
                <div style="clear: both;"></div>
             </div>
              <style type="text/css">
                  .leftstyle{
                      float:left;
                      width: 80px;
                      height: 260px;
                      line-height: 260px;
                      border: 1px solid #eee;
                      text-align: center;
                  }

                  .rightstyle{
                      float: left;
                      margin-left: 5px;
                      height: 250px;
                      width: 1000px;
                      border: 1px solid #eee;
                      padding:5px 10px;
                  }
              </style>
             <div class="form">留言时间：<?php echo $_smarty_tpl->tpl_vars['messageOne']->value['pub_date'];?>
</div>
             <div class="form"><a href="javascript:history.back();">【返回】</a></div>
  </div>
</div>
</body>
</html>
<?php }
}
?>