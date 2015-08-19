<?php
/**
 * @Author: siyizhen
 * @emial:  1193814298@qq.com
 * @Date:   2015-08-16 16:04:40
 * @Last Modified by:   siyizhen
 * @Last Modified time: 2015-08-18 22:02:36
 */

	class positionController{
		public function __construct(){
			require_once ADMIN_PATH.'/admin/common/common.php';
		}

		/**
		 * 列出所有职位信息
		 * @return  
		 */
		public function position_list(){
			$position_m=M('position');
			$positionInfo=$position_m->getPositionInfo();
			VIEW::assign('positionInfo',$positionInfo);
			VIEW::display('position/position_list.html');
		}

		/**
		 * 添加职位信息第一层逻辑
		 * @return  
		 */
		public function position_add(){
			if(empty($_POST['submit'])){
				$release_time=date("Y-m-d H:i:s");
				VIEW::assign('release_time',$release_time);
				VIEW::display('position/position_add.html');
			}else{
				$this->position_add_do();
			}
		}

		/**
		 * 添加职位信息
		 * @return  
		 */
		public function position_add_do(){
			if(empty($_POST['position_name'])){
				showMessage('职位名称不能为空！',"admin_cpositi
					on_mposition_add.html");
			}else{
				$position_name=safeString($_POST['position_name']);
			}
			if(empty($_POST['content'])){
				showMessage('岗位要求不能为空！',"admin_cposition_mposition_add.html");
			}else{
				$content=safeString($_POST['content']);
			}
			if(empty($_POST['work_place'])){
				showMessage('工作地点不能为空！',"admin_cposition_mposition_add.html");
			}else{
				$work_place=safeString($_POST['work_place']);
			}
			$numbers=intval(safeString($_POST['numbers']));
			$release_time=safeString($_POST['release_time']);
			$position_m=M('position');
			if($position_m->position_add($position_name,$content,$work_place,$numbers,$release_time)){
				showMessage('职位添加成功！',"admin_cposition_mposition_list.html");
			}else{
				showMessage('职位添加失败！',"admin_cposition_mposition_add.html");
			}
		}

		/**
		 * 删除职位信息逻辑操作
		 * @return  
		 */
		public function position_delete(){
			$id=intval(safeString($_GET['id']));
			$position_m=M('position');
			if($position_m->position_delete($id)){
				showMessage('职位信息删除成功!',"admin_cposition_mposition_list.html");
			}else{
				showMessage('职位信息删除失败！',"admin_cposition_mposition_list.html");
			}
		}

		/**
		 * 编辑职位信息第一层逻辑
		 * @return  
		 */
		public function position_edit(){
			$id=intval(safeString($_GET['id']));
			if(empty($_POST['submit'])){
				$position_m=M('position');
				$info=$position_m->getInfoById($id);
				VIEW::assign('info',$info);
				VIEW::display('position/position_edit.html');
			}else{
				$this->position_edit_do($id);
			}
		}

		public function  position_edit_do($id){
			if(empty($_POST['position_name'])){
				showMessage('职位名称不能为空！',"admin_cpositi
					on_mposition_add.html");
			}else{
				$position_name=safeString($_POST['position_name']);
			}
			if(empty($_POST['content'])){
				showMessage('岗位要求不能为空！',"admin_cposition_mposition_add.html");
			}else{
				$content=safeString($_POST['content']);
			}
			if(empty($_POST['work_place'])){
				showMessage('工作地点不能为空！',"admin_cposition_mposition_add.html");
			}else{
				$work_place=safeString($_POST['work_place']);
			}
			$numbers=intval(safeString($_POST['numbers']));
			$release_time=safeString($_POST['release_time']);
			$position_m=M('position');
			if($position_m->position_edit($position_name,$content,$work_place,$numbers,$release_time,$id)){
				showMessage('职位编辑成功！',"admin_cposition_mposition_list.html");
			}else{
				showMessage('职位编辑失败！',"admin_cposition_mposition_edit.html");
			}
		}

		/**
		 * 得到所有应聘人的信息
		 * @return  
		 */
		public function personel_list(){
			$personel_m=M('personel');
			$personel_info=$personel_m->getPersonelInfo();
			VIEW::assign("personelInfo",$personel_info);
			VIEW::display("position/personel_list.html");
		}

		/**
		 * 得到某一应聘者的详细信息
		 * @return  
		 */
		public function personel_info(){
			$id=intval(safeString($_GET['id']));
			$personel_m=M('personel');
			$personel_info_one=$personel_m->getPersonelInfoById($id);
			VIEW::assign("personel_info_one",$personel_info_one);
			VIEW::display("position/personel_detailInfo.html");
		}

		/**
		 * 编辑人才信息第一层逻辑
		 * @return  
		 */
		public function personel_edit(){
			$id=intval($_GET['id']);
			if(empty($_POST['submit'])){
				$personel_m=M('personel');
				$personel_info_one=$personel_m->getPersonelInfoById($id);
				VIEW::assign("personel_info_one",$personel_info_one);
				VIEW::display("position/personel_edit.html");
			}else{
				$this->personel_edit_do($id);
			}
		}

		/**
		 * 编辑人才信息的具体操作
		 * @param  integer $id 
		 * @return      
		 */
		public function personel_edit_do($id){
			if(empty($_POST['name'])){
				showMessage('姓名不能为空！',"admin_cposition_mpersonel_edit_i".$id.".html");
			}else{
				$name=safeString($_POST['name']);
			}

			if(empty($_POST['sex'])){
				showMessage('性别不能为空！',"admin_cposition_mpersonel_edit_i".$id.".html");
			}else{
				$sex=safeString($_POST['sex']);
			}

			if(empty($_POST['position_name'])){
				showMessage('应聘职位不能为空！',"admin_cposition_mpersonel_edit_i".$id.".html");
			}else{
				$position_name=safeString($_POST['position_name']);
			}

			if(empty($_POST['hometown'])){
				showMessage('贯籍不能为空！',"admin_cposition_mpersonel_edit_i".$id.".html");
			}else{
				$hometown=safeString($_POST['hometown']);
			}

			if(empty($_POST['phone'])){
				showMessage('联系电话不能为空！',"admin_cposition_mpersonel_edit_i".$id.".html");
			}else{
				$phone=safeString($_POST['phone']);
			}

			if(empty($_POST['work_experience'])){
				showMessage('工作经历不能为空！',"admin_cposition_mpersonel_edit_i".$id.".html");
			}else{
				$work_experience=safeString($_POST['work_experience']);
			}

			$families_of_emergency_call=safeString($_POST['families_of_emergency_call']);
			$height=safeString($_POST['height']);
			$address=safeString($_POST['address']);
			$school_of_graduation=safeString($_POST['school_of_graduation']);
			$date_of_birth=safeString($_POST['date_of_birth']);
			$english_level=safeString($_POST['english_level']);
			$email=safeString($_POST['email']);
			$pub_date=safeString($_POST['pub_date']);
			//附件路径问题再说，后续添加
			$personel_m=M('personel');
			if($personel_m->personel_edit($name,$sex,$height,$position_name,$hometown,$pub_date,$email,$english_level,$date_of_birth,$school_of_graduation,$address,$families_of_emergency_call,$work_experience,$phone,$id)){
				showMessage('人才信息编辑成功！',"admin_cposition_mpersonel_list.html");
			}else{
				showMessage('人才信息编辑失败！',"admin_cposition_mpersonel_edit_i".$id.".html");
			}
		}

		/**
		 * 删除人才信息
		 * @return  
		 */
		public function personel_delete(){
			$id=intval($_GET['id']);
			$personel_m=M('personel');
			if($personel_m->personel_delete($id)){
				showMessage('人才信息删除成功！',"admin_cposition_mpersonel_list.html");
			}else{
				showMessage('人才信息删除失败！',"admin_cposition_mpersonel_list.html");
			}
		}

	}




?>