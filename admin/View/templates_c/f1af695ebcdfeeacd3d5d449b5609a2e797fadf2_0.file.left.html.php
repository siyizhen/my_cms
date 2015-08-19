<?php /* Smarty version 3.1.27, created on 2015-08-18 20:46:50
         compiled from "E:\Demo\my_web\admin\View\templates\left.html" */ ?>
<?php
/*%%SmartyHeaderCode:2292555d3293a29d618_29234157%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1af695ebcdfeeacd3d5d449b5609a2e797fadf2' => 
    array (
      0 => 'E:\\Demo\\my_web\\admin\\View\\templates\\left.html',
      1 => 1439811974,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2292555d3293a29d618_29234157',
  'variables' => 
  array (
    'web' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55d3293a2ad019_16191919',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55d3293a2ad019_16191919')) {
function content_55d3293a2ad019_16191919 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2292555d3293a29d618_29234157';
?>
<div id="content">
    <div class="space"></div>
    <div class="menu fleft">
        <ul>
            <li class="subMenuTitle"><?php echo $_smarty_tpl->tpl_vars['web']->value;?>
</li>
            <li class="subMenu"><a href="admin_cindex_mwelcome.html" target="right">后台首页</a></li>
            <li class="subMenu"><a href="#" target="right">产品管理</a>
                <ul>
                    <li><a href="admin_cproduct_mpro_list.html" target="right">产品编辑</a></li>
                    <li><a href="admin_cproduct_mpro_category_list.html" target="right">分类列表</a></li>
                    <li><a href="admin_cproduct_mpro_set.html" target="right">产品设置</a></li>
                </ul>
            </li>
            <li class="subMenu"><a href="#" target="right">招聘管理</a>
                <ul>
                    <li><a href="admin_cposition_mposition_list.html" target="right">职位管理</a></li>
                    <li><a href="admin_cposition_mpersonel_list.html" target="right">应聘管理</a></li>
                </ul>
            </li>
            <li class="subMenu"><a href="#" target="right">留言管理</a>
                <ul>
                    <li><a href="admin_cmessage_mmessage_list.html" target="right">留言列表</a></li>
                </ul>
            </li>
            <li class="subMenu"><a href="#" target="right">会员管理</a>
                <ul>
                    <li><a href="admin_cmembers_mmembers_list.html" target="right">会员列表</a></li>
                </ul>
            </li>
            <li class="subMenu"><a href="#" target="right">系统设置</a>
                <ul>
                    <li><a href="admin_csystem_mweb_base_info.html" target="right">网站信息</a></li>
                    <li><a href="#">产品管理</a></li>
                    <li><a href="#">产品设置</a></li>
                </ul>
            </li>
            <li class="subMenu"><a href="#" target="right">标题标题标题</a></li>
            <li class="subMenu"><a href="#" target="right">标题标题标题</a></li>
        </ul>
    </div>
    <div class="sidebar fleft"><div class="btn"></div></div>
    <div class="page">
    <iframe width="100%" scrolling="auto" height="100%" frameborder="false" allowtransparency="true" style="border: medium none;" src="admin_cindex_mwelcome.html" id="rightMain" name="right"></iframe>
    </div>
    </div><?php }
}
?>