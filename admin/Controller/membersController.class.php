<?php
/**
 * @Author: siyizhen
 * @emial:  1193814298@qq.com
 * @Date:   2015-08-17 19:34:12
 * @Last Modified by:   siyizhen
 * @Last Modified time: 2015-08-17 19:34:57
 */
class membersController{
	public function __construct(){
		require_once ADMIN_PATH.'/admin/common/common.php';
	}

	public function members_list(){
		VIEW::display('members/members_list.html');
	}
}