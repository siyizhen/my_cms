<?php
/**
 * @Author: siyizhen
 * @Date:   2015-08-07 15:11:35
 * @Last Modified by:   Administrator
 * @Last Modified time: 2015-08-16 12:51:46
 */

class categoryModel{
	private static $table='cx_category';

	/**
	 * 递归的方式获取产品分类
	 */
	public function getCategory($bid=0,&$rows=array(),$space=-2){
		$space=$space+2;
		$sql="SELECT id,bid,name,sort FROM ".self::$table." WHERE `bid`='$bid'";
		$result=DB::query($sql);
		while(@$row=mysql_fetch_assoc($result)){
			$row['name']=str_repeat('&nbsp;&nbsp;', $space).$row['name'];
			$rows[]=$row;
			$this->getCategory($row['id'],$rows,$space);
		}
		return $rows;
	}

	/**
	 * 下拉列表的形式显示分类信息
	 * @param  array
	 * @return string
	 */
	public function displayCategory($rows,$id){
		$item='';
		foreach($rows as $row){
			//用来自动选定对应的分类
			if($row['id']==$id){
				$select='selected';
			}else{
				$select='';
			}
			$item.='<option value="'.$row['id'].'"'.$select.'>'.$row['name'].'</option><br />';
		}
		return $item;
	}

	/**
	 * 显示分类列表
	 * @param  array $rows 分类信息数组
	 * @return string       
	 */
	public function listCategory($rows){
		$item='';
		foreach ($rows as $row) {
			$item.='<li><p>'.$row['name'].'【'.$row['sort'].'】</p></li>
			<li><span>【<a href="admin_cproduct_mpro_category_add_i'.$row['id'].'.html">添加</a>】</span>
				<span>【<a href="admin_cproduct_mpro_category_edit_i'.$row['id'].'.html">编辑</a>】</span>
				<span>【<a href="javascript:void(0);" onclick="sure1('.$row['id'].')">删除</a>】</span>
			</li>';
		}
		return $item;
	}

	/**
	 * 分类操作添加的业务逻辑
	 * @param  integer
	 * @param  string
	 * @param  integer
	 * @return integer or null
	 */
	public function category_add($sort,$name,$category){
		$arr['sort']=$sort;
		$arr['name']=$name;
		$arr['bid']=$category;
		return DB::insert(self::$table,$arr);
	}

	/**
	 * 获取指定id的分类信息
	 * @param  integer $id 
	 * @return array   
	 */
	public function getCategoryInfo($id){
		$sql="SELECT * FROM ".self::$table." WHERE `id`='$id'";
		$row=DB::fetchOne($sql);
		return $row;
	}

	/**
	 * 获取父级产品分类
	 * @param  array $rows 
	 * @param  integer $id   
	 * @return string       
	 */
	public function getParentCategory($rows,$id){
		$parent_id=$this->getParentCategoryInfo($id);
		$item='';
		foreach($rows as $row){
			//用来自动选定对应的分类
			if($row['id']==$parent_id){
				$select='selected';
			}else{
				$select='';
			}
			$item.='<option value="'.$row['id'].'"'.$select.'>'.$row['name'].'</option><br />';
		}
		return $item;
	}

	/**
	 * 获取父级产品分类信息
	 * @param  integer $id 
	 * @return integer     
	 */
	public function getParentCategoryInfo($id){
		$sql="SELECT * FROM ".self::$table." WHERE `id`='$id'";
		$cur_row=DB::fetchOne($sql);
		$cur_id=$cur_row['bid'];
		$sql="SELECT * FROM ".self::$table." WHERE `id`='$cur_id'";
		$parent_row=DB::fetchOne($sql);
		$parent_id=$parent_row['id'];
		return $parent_id;
	}

	/**
	 * 编辑产品分类的具体操作
	 * @param  integer $sort     
	 * @param  string $name     
	 * @param  integer $category 
	 * @param  integer $id       
	 * @return            
	 */
	public function pro_category_edit($sort,$name,$category,$id){
		$arr['sort']=$sort;
		$arr['name']=$name;
		$sql="SELECT * FROM ".self::$table." WHERE `id`='$category'";
		$row=DB::fetchOne($sql);
		$bid=$row['id'];
		$arr['bid']=$bid;
		return DB::update(self::$table,$arr," id='$id'");
	}

	/**
	 * 获取要删除的产品分类的id及该分类下的所有子类id
	 * @param  integer $id 
	 * @return string
	 */
	public function getCategoryIds($id){
		$childCategory=$this->getCategory($id);
		$ids=array();
        foreach ($childCategory as $key => $value) {
            //var_dump($value);
            $ids[]=$value['id'];
        }
        $ids[]=$id;//将没有子分类的分类的id,即本身包含进去
        $ids=join(',', $ids);
        return $ids;
	}

	/**
	 * 删除产品分类业务操作
	 * @param  string $ids 
	 * @return       
	 */
	public function pro_category_delete($ids){
		return DB::delete(self::$table," `id` in ($ids)");
	}

	/**
	 * 获取分类最底层的子类，用递归的方法
	 * @param  [type] $result bid=0的资源结果集
	 * @param  array  &$rows  用来存放底层子类的数组
	 * @return array         关联数组，下标为分类对应的id，值为底层分类名
	 */
	public function getLastCategory($result,&$rows=array()){
		while(@$row=mysql_fetch_assoc($result)){//循环根分类
			$id=$row['id'];
			$result1=$this->result($id);//获得根分类的子分类的结果集
			$num=$this->num($id);//获得根分类的子分类的数目
			if($num > 0){//大于0表示有子分类
				$this->getLastCategory($result1,$rows);
			}else{//表示没有子分类，则取本身就是最底层分类
				$sql="select * from ".self::$table." where id='$id'";
				$result2=mysql_query($sql);
				$row=mysql_fetch_assoc($result2);
				$id=$row['id'];
				$rows[$id]=$row['name'];//数组下标对应底层分类的id
			}
		}
		return $rows;
	}

	/**
	 * 获取根分类的资源结果集
	 * @param  integer $id 
	 * @return [type]      
	 */
	public function result($id=0){
		$sql="select * from ".self::$table." where bid='$id'";
		return DB::query($sql);
	}

	/**
	 * 获取根分类的数目
	 * @param  integer $id 
	 * @return integer      
	 */
	public function num($id=0){
		$sql="select * from ".self::$table." where bid='$id'";
		return DB::getNum($sql);
	}

	/**
	 * 下拉列表的形式显示最底层子类
	 * @param  array $lastCategory 最底层子类数组信息
	 * @return string               
	 */
	public function displayLastCategory($lastCategory){
		$item='';
		foreach($lastCategory as $key => $value){
			$item.='<option value="'.$key.'">'.$value.'</option>';
		}
		return $item;
	}

	/**
	 * 下拉列表形式显示最底层子类
	 * @param  array $lastCategory 
	 * @return  stirng             
	 */
	public function displayLastCategoryByUrl($lastCategory){
		$item='';
		
		foreach($lastCategory as $key => $value){
			
			$item.='<option value="admin_cproduct_mpro_list_i'.$key.'.html">'.$value.'</option>';
		}
		return $item;
	}

	/**
	 * 获取当前分类的父级id
	 * @param  integer $category 
	 * @return integer           
	 */
	public function getBid($category){
		$sql="SELECT id,bid FROM ".self::$table." WHERE `id`='$category'";
		$row=DB::fetchOne($sql);
		$bid=$row['bid'];
		return $bid;
	}


}