<?php
/**
 * @Author: siyizhen
 * @emial:  1193814298@qq.com
 * @Date:   2015-08-17 20:18:35
 * @Last Modified by:   siyizhen
 * @Last Modified time: 2015-08-18 22:02:10
 */
class personelModel{
	private static $table='cx_personel';

	/**
	 * 得到所有应聘人的信息的业务操作
	 * @return  array or null
	 */
	public function getPersonelInfo(){
		$sql="SELECT * FROM ".self::$table;
		return DB::fetchAll($sql);
	}

	/**
	 * 得到某一应聘者的详细信息
	 * @param  integer $id 
	 * @return array or null  
	 */
	public function getPersonelInfoById($id){
		$sql="SELECT * FROM ".self::$table." WHERE `id`='$id'";
		return DB::fetchOne($sql);
	}

	/**
	 * 人才编辑业务层
	 * @param  [type] $name                       [description]
	 * @param  [type] $sex                        [description]
	 * @param  [type] $height                     [description]
	 * @param  [type] $position_name              [description]
	 * @param  [type] $hometown                   [description]
	 * @param  [type] $pub_date                   [description]
	 * @param  [type] $email                      [description]
	 * @param  [type] $english_level              [description]
	 * @param  [type] $date_of_birth              [description]
	 * @param  [type] $school_of_graduation       [description]
	 * @param  [type] $address                    [description]
	 * @param  [type] $families_of_emergency_call [description]
	 * @param  [type] $work_experience            [description]
	 * @param  [type] $phone                      [description]
	 * @param  [type] $id                         [description]
	 * @return integer or false
	 */
	public function personel_edit($name,$sex,$height,$position_name,$hometown,$pub_date,$email,$english_level,$date_of_birth,$school_of_graduation,$address,$families_of_emergency_call,$work_experience,$phone,$id){
		$arr['name']=$name;
		$arr['position_name']=$position_name;
		$arr['sex']=$sex;
		$arr['height']=$height;
		$arr['hometown']=$hometown;
		$arr['pub_date']=$pub_date;
		$arr['email']=$email;
		$arr['english_level']=$english_level;
		$arr['date_of_birth']=$date_of_birth;
		$arr['school_of_graduation']=$school_of_graduation;
		$arr['address']=$address;
		$arr['families_of_emergency_call']=$families_of_emergency_call;
		$arr['work_experience']=$work_experience;
		$arr['phone']=$phone;
		return DB::update(self::$table,$arr," `id`='$id'");
	}

	/**
	 * 删除人才信息业务操作
	 * @param  integer $id 
	 * @return integer or null
	 */
	public function personel_delete($id){
		return DB::delete(self::$table," `id`='$id'");
	}

}