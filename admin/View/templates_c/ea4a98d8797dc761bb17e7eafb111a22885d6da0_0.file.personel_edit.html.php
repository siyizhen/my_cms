<?php /* Smarty version 3.1.27, created on 2015-08-18 21:56:45
         compiled from "E:\Demo\my_web\admin\View\templates\position\personel_edit.html" */ ?>
<?php
/*%%SmartyHeaderCode:2640755d3399db24dd3_66247626%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea4a98d8797dc761bb17e7eafb111a22885d6da0' => 
    array (
      0 => 'E:\\Demo\\my_web\\admin\\View\\templates\\position\\personel_edit.html',
      1 => 1439906202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2640755d3399db24dd3_66247626',
  'variables' => 
  array (
    'personel_info_one' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55d3399dbf7d03_48969258',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55d3399dbf7d03_48969258')) {
function content_55d3399dbf7d03_48969258 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2640755d3399db24dd3_66247626';
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
     人才信息编辑
  </div>
<form action="admin_cposition_mpersonel_edit_i<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['id'];?>
.html" method="post">
             <div class="form">姓名：<input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['name'];?>
"></div>
             <div class="form">身高：<input type="text" name="height" value="<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['height'];?>
"></div>
             <div class="form">性别：<input type="text" name="sex" value="<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['sex'];?>
"></div>
             <div class="form">住址：<input type="text" name="address" value="<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['address'];?>
"></div>
             <div class="form">毕业学校：<input type="text" name="school_of_graduation" value="<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['school_of_graduation'];?>
"></div>
             <div class="form">英语水平：<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['english_level'];?>
" name="english_level"></div>
             <div class="form">应聘职位：<input type="text" name="position_name" value="<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['position_name'];?>
"></div>
             <div class="form">贯籍：<input type="text" name="hometown" value="<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['hometown'];?>
"></div>
             <div class="form">出生年月：<input type="text" name="date_of_birth" value="<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['date_of_birth'];?>
"></div>
             <div class="form">联系电话：<input type="text" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['phone'];?>
"></div>
             <div class="form">家属紧急电话：<input type="text" name="families_of_emergency_call" value="<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['families_of_emergency_call'];?>
"></div>
             <div class="form">电子邮箱：<input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['email'];?>
"></div>
             <div>
                <div class="leftstyle">工作经历：</div>
                <textarea class="rightstyle" name="work_experience"><?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['work_experience'];?>
</textarea>
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
             <div class="form">应聘日期：<input type="text" name="pub_date" value="<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['pub_date'];?>
"></div>
             <div class="form">附件：<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['personel_info_one']->value['attachment'];?>
" name="attachment"></div>
             <div class="form1"><input type="submit" name="submit" value="提交"><input type="reset" value="重置"></div>
        </form>     
  </div>
</div>
</body>
</html>
<?php }
}
?>