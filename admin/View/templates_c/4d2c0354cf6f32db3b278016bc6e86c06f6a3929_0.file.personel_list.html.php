<?php /* Smarty version 3.1.27, created on 2015-08-18 20:57:13
         compiled from "E:\Demo\my_web\admin\View\templates\position\personel_list.html" */ ?>
<?php
/*%%SmartyHeaderCode:54555d32ba9ba4942_17303010%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d2c0354cf6f32db3b278016bc6e86c06f6a3929' => 
    array (
      0 => 'E:\\Demo\\my_web\\admin\\View\\templates\\position\\personel_list.html',
      1 => 1439902336,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54555d32ba9ba4942_17303010',
  'variables' => 
  array (
    'personelInfo' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55d32ba9c39063_79359240',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55d32ba9c39063_79359240')) {
function content_55d32ba9c39063_79359240 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '54555d32ba9ba4942_17303010';
echo $_smarty_tpl->getSubTemplate ("../header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo '<script'; ?>
 type="text/javascript" src="js/admin.js"><?php echo '</script'; ?>
>
  <div class="pageColumn">
  <div class="pageButton main_info">
      人才列表
      <?php echo '<script'; ?>
 type="text/javascript">
        function sure(id){
          if(confirm('你确定要删除吗？删除数据不可恢复')){
            window.location.href="admin_cposition_mpersonel_delete_i"+id+".html";
          }else{
            return false;
          }
        }
      <?php echo '</script'; ?>
>
  </div>
    <table>
    </tr>
    <thead>
    <th width="25"><input name="" type="checkbox" value="" /></th>
    <th width="10%">编号</th>
     <th width="20%">姓名</th>
      <th width="20%">应聘职位</th>
      <th width="20%">应聘日期</th>
      <th width="">操作</th>
        </thead>
    <tbody>
      <?php
$_from = $_smarty_tpl->tpl_vars['personelInfo']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['m']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
$foreach_m_Sav = $_smarty_tpl->tpl_vars['m'];
?>
        <tr>
        <td class="checkBox"><input name="" type="checkbox" value="" /></td>
        <td><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['m']->value['position_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['m']->value['pub_date'];?>
</td>
        <td><span><a href="admin_cposition_mpersonel_info_i<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
.html">【详细信息】</a></span><span><a href="admin_cposition_mpersonel_edit_i<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
.html">【编辑】</a></span></span><span><a href="javascript:void(0);" onclick="sure('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
');">【删除】</a></span></td>
      </tr>
      <?php
$_smarty_tpl->tpl_vars['m'] = $foreach_m_Sav;
}
?>
    </tbody>
  </table>
  </div>
</div>
</body>
</html>
<?php }
}
?>