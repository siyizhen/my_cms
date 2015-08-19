<?php /* Smarty version 3.1.27, created on 2015-08-18 20:57:25
         compiled from "E:\Demo\my_web\admin\View\templates\position\position_add.html" */ ?>
<?php
/*%%SmartyHeaderCode:2590855d32bb557d0c2_75724779%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd69bd6fe1cca1349dc824d466a03221d8b877071' => 
    array (
      0 => 'E:\\Demo\\my_web\\admin\\View\\templates\\position\\position_add.html',
      1 => 1439716336,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2590855d32bb557d0c2_75724779',
  'variables' => 
  array (
    'release_time' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55d32bb55c7459_37487635',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55d32bb55c7459_37487635')) {
function content_55d32bb55c7459_37487635 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2590855d32bb557d0c2_75724779';
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
  <div class="pageColumn">
  <div class="pageButton main_info">
      添加职位
  </div>
  <form action="" method="post" enctype="multipart/form-data">
        <div class="form"><label for="position_name"><span style="color: red; font-weight: bolder;">*</span>职位名称：</label><input type="text" name="position_name" id="position_name"></div>
        <div class="form"><label for="numbers">人数：</label><input type="text" name="numbers" id="numbers"></div>
        <div class="form"><label for="work_place">工作地点：</label><input type="text" name="work_place" id="work_place"></div>
        <div class="form"><label for="release_time">发布时间：</label><input type="text" name="release_time" id="release_time" value="<?php echo $_smarty_tpl->tpl_vars['release_time']->value;?>
"></div>
        <div class="content_left">
          <label>岗位要求:</label>
        </div>
        <textarea class="content_right" name="content" id="content">
        </textarea>
        <div class="form1"><input type="submit" value="提交" name="submit"><input type="reset" value="重置"></div>
  </form>
  </div>
</div>
</body>
</html>
<?php }
}
?>