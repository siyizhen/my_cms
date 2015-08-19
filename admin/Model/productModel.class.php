<?php
/**
 * @Author: siyizhen
 * @Date:   2015-08-11 10:01:32
 * @Last Modified by:   Administrator
 * @Last Modified time: 2015-08-16 12:54:29
 */

class productModel{
	private static $table='cx_product';
	private static $table_set='cx_product_set';

	/**
	 * 添加产品信息业务逻辑操作
	 * @param  integer $sort      
	 * @param  integer $bid       
	 * @param  string $title     
	 * @param  string $content   
	 * @param  string $picPath   
	 * @param  string $author    
	 * @param  integer $category  
	 * @param  string $type      
	 * @param  string $parameter 
	 * @param  string $discount  
	 * @param  string $brand     
	 * @param  string $producers 
	 * @param  string $price     
	 * @param  string $keywords  
	 * @return            
	 */
	public function pro_add($sort,$bid,$title,$content,$picPath,$author,$category,$type,$parameter,$discount,$brand,$producers,$price,$keywords){
		$arr['sort']=$sort;
		$arr['bid']=$bid;
		$arr['title']=$title;
		$arr['content']=$content;
		$arr['pic1']=$picPath[0];
		$arr['pic2']=$picPath[1];
		$arr['author']=$author;
		$arr['category_id']=$category;
		$arr['pub_date']=date("Y-m-d H:i:s");
		$arr['modify_time']=date("Y-m-d H:i:s");
		//添加产品设置模块的信息，写入数据库
		$arr['type']=$type;
		$arr['parameter']=$parameter;
		$arr['discount']=$discount;
		$arr['brand']=$brand;
		$arr['producers']=$producers;
		$arr['price']=$price;
		$arr['keywords']=$keywords;
		$arr['the_order']=$sort;
		return DB::insert(self::$table,$arr);
	}

	/**
	 * 产品修改操作的具体业务逻辑
	 * @param  integer $sort      
	 * @param  integer $bid       
	 * @param  string $title     
	 * @param  string $content   
	 * @param  string $picPath   
	 * @param  string $author    
	 * @param  integer $category  
	 * @param  string $type      
	 * @param  string $parameter 
	 * @param  string $discount  
	 * @param  string $brand     
	 * @param  string $producers 
	 * @param  string $price     
	 * @param  string $keywords  
	 * @return 
	 */
	public function pro_edit($sort,$bid,$title,$content,$picPath,$author,$category,$type,$parameter,$discount,$brand,$producers,$price,$keywords,$id){
		$arr['sort']=$sort;
		$arr['bid']=$bid;
		$arr['title']=$title;
		$arr['content']=$content;
		$arr['pic1']=$picPath[0];
		$arr['pic2']=$picPath[1];
		$arr['author']=$author;
		$arr['category_id']=$category;
		$arr['modify_time']=date("Y-m-d H:i:s");
		//添加产品设置模块的信息，写入数据库
		$arr['type']=$type;
		$arr['parameter']=$parameter;
		$arr['discount']=$discount;
		$arr['brand']=$brand;
		$arr['producers']=$producers;
		$arr['price']=$price;
		$arr['keywords']=$keywords;
		$arr['the_order']=$sort;
		return DB::update(self::$table,$arr," `id`='$id'");
	}

	/**
	 * 产品信息的删除操作
	 * @param  integer $id 
	 * @return      
	 */
	public function pro_delete($id){
		return DB::delete(self::$table," `id`='$id'");
	}

	/**
	 * 删除图片信息
	 * @param  integer $id 
	 * @return      
	 */
	public function deletePics($id){
		$sql="SELECT pic1,pic2,id FROM ".self::$table." WHERE `id`='$id'";
		$row=DB::fetchOne($sql);
		$pic1=$row['pic1'];
		$pic2=$row['pic2'];
		if(file_exists($pic1)){
			unlink($pic1);
		}
		if(file_exists($pic2)){
			unlink($pic2);
		}
	}

	/**
	 * 删除图片一
	 * @param  
	 * @return 
	 */
	public function pro_dela($id){
		$sql="SELECT pic1,id FROM ".self::$table." WHERE `id`='$id'";
		$row=DB::fetchOne($sql);
		$pic1=$row['pic1'];
		$arr['pic1']='';
		$state=DB::update(self::$table,$arr," `id`='$id'");
		if(file_exists($pic1)){
			if(unlink($pic1) && $state){
				return true;
			}else{
				return false;
			}
		}
	}

	/**
	 * 删除图片二
	 * @param  
	 * @return 
	 */
	public function pro_delb($id){
		$sql="SELECT pic2,id FROM ".self::$table." WHERE `id`='$id'";
		$row=DB::fetchOne($sql);
		$pic2=$row['pic2'];
		$arr['pic2']='';
		$state=DB::update(self::$table,$arr," `id`='$id'");
		if(file_exists($pic2)){
			if(unlink($pic2) && $state){
				return true;
			}else{
				return false;
			}
		}
	}

	/**
	 * 获取所有产品信息记录
	 * @return array 
	 */
	public function getInfo(){
		$sql="SELECT id,sort,pub_date,title,recommended FROM ".self::$table." ORDER BY sort DESC";
		$rows=DB::fetchAll($sql);
		return $rows;
	}

	/**
	 * 根据分类的id得指定产品的信息
	 * @param  integer $id 
	 * @return array     
	 */
	public function getInfoById($id){
		$sql="SELECT id,sort,pub_date,title,recommended FROM ".self::$table." WHERE `category_id`='$id' ORDER BY sort ASC";
		$rows=DB::fetchAll($sql);
		return $rows;
	}

	/**
	 * 根据产品的id得到指定的产品信息
	 * @param  integer $id 
	 * @return array     
	 */
	public function getMessById($id){
		$sql="SELECT * FROM ".self::$table." WHERE `id`='$id' LIMIT 1";
		$row=DB::fetchOne($sql);
		return $row;
	}

	/**
	 * 设置推荐信息
	 * @param  integer $id 
	 * @return 
	 */
	public function pro_recommended($id){
		$arr['recommended']='1';
		return DB::update(self::$table,$arr," `id`='$id'");
	}

	/**
	 * 取消推荐信息
	 * @param  integer $id 
	 * @return      
	 */
	public function pro_cancel($id){
		$arr['recommended']='0';
		return DB::update(self::$table,$arr," `id`='$id'");
	}

	/**
	 * 调整产品顺序业务层
	 * @param  integer $id1 
	 * @param  integer $id2 
	 * @return  boolean     
	 */
	public function adjust_order($id1,$id2){
		$sql1="SELECT id,the_order,sort	FROM ".self::$table." WHERE `id`='$id1'";
		$row1=DB::fetchOne($sql1);
		$order1=$row1['the_order'];
		$sql2="SELECT id,the_order,sort FROM ".self::$table." WHERE `id`='$id2'";
		$row2=DB::fetchOne($sql2);
		$order2=$row2['the_order'];

		$arr1['sort']=$order2;
		$arr1['the_order']=$order2;
		$state1=DB::update(self::$table,$arr1," `id`='$id1'");
		$arr2['sort']=$order1;
		$arr2['the_order']=$order1;
		$state2=DB::update(self::$table,$arr2," `id`='$id2'");

		if($state1 &&  $state2){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * 设置产品属性
	 * @param   $is_type      
	 * @param   $is_price     
	 * @param   $is_brand     
	 * @param   $is_producers 
	 * @param   $is_parameter 
	 * @param   $is_discount  
	 * @param   $is_keywords  
	 * @param   $is_pic1      
	 * @param   $is_pic2      
	 * @return                
	 */
	public function pro_set_do($is_type,$is_price,$is_brand,$is_producers,$is_parameter,$is_discount,$is_keywords,$is_pic1,$is_pic2){
		$arr['is_type']=$is_type;
		$arr['is_price']=$is_price;
		$arr['is_brand']=$is_brand;
		$arr['is_producers']=$is_producers;
		$arr['is_parameter']=$is_parameter;
		$arr['is_discount']=$is_discount;
		$arr['is_keywords']=$is_keywords;
		$arr['is_pic1']=$is_pic1;
		$arr['is_pic2']=$is_pic2;
		$sql="SELECT * FROM ".self::$table_set;
		$rows=DB::fetchAll($sql);
		$id=$rows[0]['id'];
		if($id){//如果id存在则表示为更新操作
			return DB::update(self::$table_set,$arr," id='$id'");
		}else{//否则表示为插入操纵
			return DB::insert(self::$table_set,$arr);
		}
	}

	/**
	 * 得到产品属性设置信息
	 * @return array 
	 */
	public function productSetInfo(){
		$sql="SELECT * FROM ".self::$table_set;
		$rows=DB::fetchAll($sql);
		return $rows;
	}

}