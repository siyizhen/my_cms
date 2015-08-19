<?php /* Smarty version 3.1.27, created on 2015-08-18 20:51:21
         compiled from "E:\Demo\my_web\admin\View\templates\position\personel_detailInfo.html" */ ?>
<?php
/*%%SmartyHeaderCode:362355d32a498c5a40_30420994%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad8c91ffa38094752eddebf340f4c147061abced' => 
    array (
      0 => 'E:\\Demo\\my_web\\admin\\View\\templates\\position\\personel_detailInfo.html',
      1 => 1439902278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '362355d32a498c5a40_30420994',
  'variables' => 
  array (
    'personel_info_one' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55d32a4999c7f0_69546473',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55d32a4999c7f0_69546473')) {
function content_55d32a4999c7f0_69546473 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '362355d32a498c5a40_30420994';
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
      <span style="color:red;font-weight: bolder;"><?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['name'];?>
</span>的详细信息
  </div>
        <div class="form">姓名：<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['name'];?>
</div>
        <div class="form">身高：<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['height'];?>
</div>
        <div class="form">性别：<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['sex'];?>
</div>
        <div class="form">住址：<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['address'];?>
</div>
        <div class="form">毕业学校：<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['school_of_graduation'];?>
</div>
        <div class="form">英语水平：<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['english_level'];?>
</div>
        <div class="form">应聘职位：<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['position_name'];?>
</div>
        <div class="form">贯籍：<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['hometown'];?>
</div>
        <div class="form">出生年月：<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['date_of_birth'];?>
</div>
        <div class="form">联系电话：<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['phone'];?>
</div>
        <div class="form">家属紧急电话：<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['families_of_emergency_call'];?>
</div>
        <div class="form">电子邮箱：<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['email'];?>
</div>
        <div class="form">工作经历：<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['work_experience'];?>
</div>
        <div class="form">应聘日期：<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['pub_date'];?>
</div>
        <div class="form">附件：<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['attachment'];?>
</div>
        <div class="form"><a href="javascript:history.back();"><span style="color:red; font-weight: bolder;">【返回】</span></a></div>
  </div>
</body>
</html>
<?php }
}
?>