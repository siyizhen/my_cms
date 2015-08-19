<?php
/**
 * 
 * @authors siyizhen (1193814298@qq.com)
 * @date    
 * @version 
 */

$admin_name=$_SESSION['admin_name'];
$week=getWeek();
$date=date("Y-m-d H:i:s");
VIEW::assign("date",$date);
VIEW::assign("week",$week);
VIEW::assign("admin_name",$admin_name);