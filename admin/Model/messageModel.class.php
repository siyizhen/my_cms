<?php
/**
 * @Author: siyizhen
 * @emial:  1193814298@qq.com
 * @Date:   2015-08-19 20:30:43
 * @Last Modified by:   siyizhen
 * @Last Modified time: 2015-08-19 21:03:58
 */
class messageModel{
	private static $table='cx_message';

	/**
	 * 得到所有的留言信息
	 * @return  array or null
	 */
	public function getMessageInfo(){
		$sql="SELECT id,title,name,content,pub_date FROM ".self::$table;
		return DB::fetchAll($sql);
	}

	/**
	 * 得到一条留言业务操作
	 * @param  integer $id 
	 * @return array or null
	 */
	public function getMessageOne($id){
		$sql="SELECT * FROM ".self::$table." WHERE `id`='$id'";
		return DB::fetchOne($sql);
	}

	/**
	 * 删除留言
	 * @param  integer $id 
	 * @return integer
	 */
	public function message_delete($id){
		return DB::delete(self::$table," `id`='$id'");
	}
}