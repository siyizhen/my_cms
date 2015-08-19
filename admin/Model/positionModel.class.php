<?php
/**
 * @Author: siyizhen
 * @emial:  1193814298@qq.com
 * @Date:   2015-08-16 16:44:06
 * @Last Modified by:   siyizhen
 * @Last Modified time: 2015-08-16 17:52:18
 */
	class positionModel{
		private static $table='cx_position';

		/**
		 * 添加职位信息的业务操作
		 * @param  stirng $position_name 
		 * @param  string $content       
		 * @param  string $work_place    
		 * @param  integer $number        
		 * @param  date $release_time  
		 * @return integer                
		 */
		public function position_add($position_name,$content,$work_place,$numbers,$release_time){
			$arr['position_name']=$position_name;
			$arr['content']=$content;
			$arr['work_place']=$work_place;
			$arr['numbers']=$numbers;
			$arr['release_time']=$release_time;
			return DB::insert(self::$table,$arr);
		}

		/**
		 * 得到所有的职位信息
		 * @return  null or integer
		 */
		public function getPositionInfo(){
			$sql="SELECT id,work_place,position_name,numbers,content,release_time 	FROM ".self::$table;
			$rows=DB::fetchAll($sql);
			return $rows;
		}

		/**
		 * 删除职位信息
		 * @param  integer $id 
		 * @return 
		 */
		public function position_delete($id){
			return DB::delete(self::$table," `id`='$id'");
		}

		/**
		 * 得到指定的职位信息
		 * @param  integer $id 
		 * @return integer
		 */
		public function getInfoById($id){
			$sql="SELECT id,work_place,numbers,position_name,content,release_time FROM ".self::$table." WHERE `id`='$id'";
			return DB::fetchOne($sql);
		}

		/**
		 * 编辑职位逻辑信息
		 * @param  string $position_name 
		 * @param  string $content       
		 * @param  string $work_place    
		 * @param  integer $numbers       
		 * @param  date $release_time  
		 * @param  integer $id            
		 * @return integer             
		 */
		public function position_edit($position_name,$content,$work_place,$numbers,$release_time,$id){
			$arr['position_name']=$position_name;
			$arr['content']=$content;
			$arr['work_place']=$work_place;
			$arr['numbers']=$numbers;
			$arr['release_time']=$release_time;
			return DB::update(self::$table,$arr," `id`='$id'");
		}
	}