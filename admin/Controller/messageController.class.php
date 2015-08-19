<?php
/**
 * @Author: siyizhen
 * @emial:  1193814298@qq.com
 * @Date:   2015-08-17 19:26:20
 * @Last Modified by:   siyizhen
 * @Last Modified time: 2015-08-19 21:02:53
 */
class messageController{
	public function __construct(){
		require_once ADMIN_PATH.'/admin/common/common.php';
	}

	/**
	 * 得到所有的留言列表
	 * @return  
	 */
	public function message_list(){
		$message_m=M('message');
		$messageInfo=$message_m->getMessageInfo();
		VIEW::assign("messageInfo",$messageInfo);
		VIEW::display('message/message_list.html');
	}

	/**
	 * 得到一条具体的留言信息
	 * @return  
	 */
	public function message_detail(){
		$id=intval(safeString($_GET['id']));
		$message_m=M('message');
		$messageOne=$message_m->getMessageOne($id);
		VIEW::assign("messageOne",$messageOne);
		VIEW::display('message/message_detail.html');
	}

	/**
	 * 删除留言逻辑操作
	 * @return  
	 */
	public function message_delete(){
		$id=intval(safeString($_GET['id']));
		$message_m=M('message');
		if($message_m->message_delete($id)){
			showMessage('留言删除成功！',"admin_cmessage_mmessage_list.html");
		}else{
			showMessage('留言删除失败！',"admin_cmessage_mmessage_list.html");
		}
	}
}