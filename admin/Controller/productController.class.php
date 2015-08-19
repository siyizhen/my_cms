<?php
/**
 * 
 * @authors siyizhen (1193814298@qq.com)
 * @date    
 * @version 
 */
class productController{

    public function __construct(){
        require_once ADMIN_PATH.'/admin/common/common.php';
    }
    /**
     * 产品类容编辑
     * @return [type] [description]
     */
    public function pro_list(){
        $category_m=M('category');
        $product_m=M('product');

        if(empty($_GET['id'])){
            $info=$product_m->getInfo();
        }else{
            $id=intval($_GET['id']);
            $info=$product_m->getInfoById($id);
        }
        //获取子分类信息
        $result=$category_m->result();
        $lastCategory=$category_m->getLastCategory($result);
        $displayLastCategoryByUrl=$category_m->displayLastCategoryByUrl($lastCategory);
        //获取子分类信息结束
        VIEW::assign("displayLastCategoryByUrl",$displayLastCategoryByUrl);
        VIEW::assign("info",$info);
        VIEW::display("product/pro_list.html");
    }

    /**
     * 编辑产品信息第一层逻辑
     * @return  
     */
    public function pro_edit(){
        $id=intval($_GET['id']);
        if(empty($_POST['submit'])){
            $product_m=M('product');
            $info=$product_m->getMessById($id);
            VIEW::assign("info",$info);
            //得到分类信息
            $category_m=M('category');
            $result=$category_m->result();
            $lastCategory=$category_m->getLastCategory($result);
            $displayLastCategory=$category_m->displayLastCategory($lastCategory);
            //得到分类信息结束
            VIEW::assign("displayLastCategory",$displayLastCategory);
            VIEW::display('product/pro_edit.html');
        }else{
            $this->pro_edit_do($id);
        }
    }

    /**
     * 产品信息修改的具体操作
     * @param  integer $id 
     * @return      
     */
    public function pro_edit_do($id){
        if(empty($_POST['sort'])){
            showMessage('排序不能为空！',"admin_cproduct_mpro_edit_i".$id.".html");
        }else{
            $sort=intval(safeString($_POST['sort']));
        }

        if(empty($_POST['title'])){
            showMessage('标题不能为空！',"admin_cproduct_mpro_edit_i".$id.".html");
        }else{
            $title=safeString($_POST['title']);
        }

        if(empty($_POST['content'])){
            showMessage('内容不能为空！',"admin_cproduct_mpro_edit_i".$id.".html");
        }else{
            $content=safeString($_POST['content']);
        }

        $author=safeString($_POST['author']);
        //产品设置模块
        $type=safeString($_POST['type']);
        $parameter=safeString($_POST['parameter']);
        $discount=safeString($_POST['discount']);
        $brand=safeString($_POST['brand']);
        $producers=safeString($_POST['producers']);
        $price=safeString($_POST['price']);
        $keywords=safeString($_POST['keywords']);
        //产品设置模块结束
        
        $pic=$_FILES['pic'];
        $pics=getPics($pic);//获取图片数组信息
        foreach ($pics as $key => $value) {
            $picPath[]=upload($value,$path='./admin/uploads/products');//获取图片具体路径信息写入数据库
        }
        //获取当前分类的父级id写入数据库bid字段
        $category=intval(safeString($_POST['category']));
        $category_m=M('category');
        $bid=$category_m->getBid($category);

        $product_m=M('product');
        if($product_m->pro_edit($sort,$bid,$title,$content,$picPath,$author,$category,$type,$parameter,$discount,$brand,$producers,$price,$keywords,$id)){
            showMessage('产品信息修改成功！',"admin_cproduct_mpro_list.html");
        }else{
            showMessage('产品信息修改失败！',"admin_cproduct_mpro_list.html");
        }
    }

    /**
     * 添加产品信息
     * @return  
     */
    public function pro_add(){
        if(empty($_POST['submit'])){
            $category_m=M('category');
            //获取子分类信息
            $result=$category_m->result();
            $lastCategory=$category_m->getLastCategory($result);
            $displayLastCategory=$category_m->displayLastCategory($lastCategory);
            //获取子分类信息结束
            $product_m=M('product');
            $setInfo=$product_m->productSetInfo();
            VIEW::assign("is_type",$setInfo[0]['is_type']);
            VIEW::assign("is_parameter",$setInfo[0]['is_parameter']);
            VIEW::assign("is_price",$setInfo[0]['is_price']);
            VIEW::assign("is_discount",$setInfo[0]['is_discount']);
            VIEW::assign("is_producers",$setInfo[0]['is_producers']);
            VIEW::assign("is_keywords",$setInfo[0]['is_keywords']);
            VIEW::assign("is_brand",$setInfo[0]['is_brand']);
            VIEW::assign("is_pic1",$setInfo[0]['is_pic1']);
            VIEW::assign("is_pic2",$setInfo[0]['is_pic2']);
            VIEW::assign('displayLastCategory',$displayLastCategory);
            VIEW::display("product/pro_add.html");
        }else{
            $this->pro_add_do();
        }
        
    }

    /**
     * 添加产品信息具体执行操作
     * @return  
     */
    public function pro_add_do(){
        if(empty($_POST['sort'])){
            showMessage('排序不能为空！',"admin_cproduct_mpro_add.html");
        }else{
            $sort=intval(safeString($_POST[sort]));
        }

        if(empty($_POST['title'])){
             showMessage('标题不能为空！',"admin_cproduct_mpro_add.html");
        }else{
            $title=safeString($_POST['title']);
        }

        if(empty($_POST['content'])){
            showMessage('内容不能为空！',"admin_cproduct_mpro_add.html");
        }else{
            $content=safeString($_POST['content']);
        }

        $author=safeString($_POST['author']);
        //产品设置模块
        $type=safeString($_POST['type']);
        $parameter=safeString($_POST['parameter']);
        $discount=safeString($_POST['discount']);
        $brand=safeString($_POST['brand']);
        $producers=safeString($_POST['producers']);
        $price=safeString($_POST['price']);
        $keywords=safeString($_POST['keywords']);
        //产品设置模块结束


        $pic=$_FILES['pic'];
        $pics=getPics($pic);//获取图片数组信息
        foreach ($pics as $key => $value) {
            $picPath[]=upload($value,$path='./admin/uploads/products');//获取图片具体路径信息写入数据库
        }
        //获取当前分类的父级id写入数据库bid字段
        $category=intval(safeString($_POST['category']));
        $category_m=M('category');
        $bid=$category_m->getBid($category);
        $product_m=M('product');
        if($product_m->pro_add($sort,$bid,$title,$content,$picPath,$author,$category,$type,$parameter,$discount,$brand,$producers,$price,$keywords)){
            showMessage('产品信息添加成功！',"admin_cproduct_mpro_list.html");
        }else{
            showMessage('产品信息添加失败！',"admin_cproduct_mpro_list.html");
        }
        
    }

    /**
     * 删除产品信息
     * @return  
     */
    public function pro_delete(){
        $id=intval($_GET['id']);
        $product_m=M('product');
        $product_m->deletePics($id);//删除图片
        if($product_m->pro_delete($id)){
            showMessage('产品删除成功！',"admin_cproduct_mpro_list.html");
        }else{
            showMessage('产品删除失败！',"admin_cproduct_mpro_list.html");
        }
    }

    /**
     * 删除图片一
     * @return  
     */
    public function pro_dela(){
        $id=intval($_GET['id']);
        $product_m=M('product');
        if($product_m->pro_dela($id)){
            showMessage('图片一删除成功！',"admin_cproduct_mpro_edit_i".$id.".html");
        }else{
            showMessage('图片一删除失败！',"admin_cproduct_mpro_edit_i".$id.".html");
        }
    }

    /**
     * 删除图片二
     * @return  
     */
    public function pro_delb(){
        $id=intval($_GET['id']);
        $product_m=M('product');
        if($product_m->pro_delb($id)){
            showMessage('图片二删除成功！',"admin_cproduct_mpro_edit_i".$id.".html");
        }else{
            showMessage('图片二删除失败！',"admin_cproduct_mpro_edit_i".$id.".html");
        }
    }

    /**
     * 推荐产品与取消推荐产品
     * @return  
     */
    public function pro_recommended(){
        $id=intval($_GET['id']);
        $action=safeString($_GET['action']);
        if($action == 'recommended'){
            $product_m=M('product');
            if($product_m->pro_recommended($id)){
                showMessage('推荐成功！',"admin_cproduct_mpro_list.html");
            }else{
                showMessage('推荐失败！',"admin_cproduct_mpro_list.html");
            }
        }

        if($action == 'cancel'){
            $product_m=M('product');
            if($product_m->pro_cancel($id)){
                showMessage('取消推荐成功！',"admin_cproduct_mpro_list.html");
            }else{
                showMessage('取消推荐失败！',"admin_cproduct_mpro_list.html");
            }
        }
    }

    /**
     * 调整产品顺序第一层逻辑
     * @return  
     */
    public function adjust_order(){
        if(empty($_POST['submit'])){
            VIEW::display("product/adjust_order.html");
        }else{
            $this->adjust_order_do();
        }
    }

    public function adjust_order_do(){
        if(empty($_POST['id1'])){
            showMessage('第一个产品的id号不能为空！',"admin_cproduct_madjust_order.html");
        }else{
            $id1=intval(safeString($_POST['id1']));
        }

        if(empty($_POST['id2'])){
            showMessage('第二个产品的id号不能为空！',"admin_cproduct_madjust_order.html");
        }else{
            $id2=intval(safeString($_POST['id2']));
        }
        $product_m=M('product');
        if($product_m->adjust_order($id1,$id2)){
            showMessage('顺序调整成功！',"admin_cproduct_mpro_list.html");
        }else{
            showMessage('顺序调整失败！',"admin_cproduct_madjust_order.html");
        }
    }

    public function pro_set(){
        $product_m=M('product');
        $setInfo=$product_m->productSetInfo();
        VIEW::assign("is_type",$setInfo[0]['is_type']);
        VIEW::assign("is_parameter",$setInfo[0]['is_parameter']);
        VIEW::assign("is_price",$setInfo[0]['is_price']);
        VIEW::assign("is_discount",$setInfo[0]['is_discount']);
        VIEW::assign("is_producers",$setInfo[0]['is_producers']);
        VIEW::assign("is_keywords",$setInfo[0]['is_keywords']);
        VIEW::assign("is_brand",$setInfo[0]['is_brand']);
        VIEW::assign("is_pic1",$setInfo[0]['is_pic1']);
        VIEW::assign("is_pic2",$setInfo[0]['is_pic2']);
        VIEW::display("product/pro_set.html");
    }

    /**
     * 设置产品属性
     * @return  
     */
    public function pro_set_do(){
        if(empty($_POST['type'])){
            $is_type=0;
        }else{
            $is_type=1;
        }
        if(empty($_POST['price'])){
            $is_price=0;
        }else{
            $is_price=1;
        }
        if(empty($_POST['parameter'])){
            $is_parameter=0;
        }else{
            $is_parameter=1;
        }
        if(empty($_POST['discount'])){
            $is_discount=0;
        }else{
            $is_discount=1;
        }
        if(empty($_POST['keywords'])){
            $is_keywords=0;
        }else{
            $is_keywords=1;
        }
        if(empty($_POST['producers'])){
            $is_producers=0;
        }else{
            $is_producers=1;
        }
        if(empty($_POST['brand'])){
            $is_brand=0;
        }else{
            $is_brand=1;
        }
        if(empty($_POST['pic1'])){
            $is_pic1=0;
        }else{
            $is_pic1=1;
        }
        if(empty($_POST['pic2'])){
            $is_pic2=0;
        }else{
            $is_pic2=1;
        }
        $product_m=M('product');
        if($product_m->pro_set_do($is_type,$is_price,$is_brand,$is_producers,$is_parameter,$is_discount,$is_keywords,$is_pic1,$is_pic2)){
            showMessage('产品属性设置成功！',"admin_cproduct_mpro_set.html");
        }else{
            showMessage('产品属性设置失败！',"admin_cproduct_mpro_set.html");
        }
    }



/**************************产品分类**********************************/

    /**
     * 添加产品分类
     * @return  
     */
    public function pro_category_add(){
        if(empty($_POST['submit'])){
            $id=intval($_GET['id']);
            $category=$this->getCategory($action='add',$id);
            VIEW::assign('category',$category);
            VIEW::display("product/pro_category_add.html");
        }else{
            $this->pro_category_add_do();
        }
    }

    /**
     * 产品分类列表
     * @return  
     */
    public function pro_category_list(){
        $listCategory=$this->getCategory($action='list');
        VIEW::assign("listCategory",$listCategory);
        VIEW::display("product/pro_category_list.html");
    }

    /**
     * 获取产品分类
     * @return 
     */
    public function getCategory($action,$id){
        $category_m=M('category');
        $rows=$category_m->getCategory();
        if($action=='add'){
            $category=$category_m->displayCategory($rows,$id);  
        }
        if($action=='list'){
            $category=$category_m->listCategory($rows);
        }
        return $category;
    }

    /**
     * 执行添加分类操作
     * @return 
     */
    public function pro_category_add_do(){
        if(empty($_POST['category_sort'])){
            showMessage('分类排序不能为空！',"admin_cproduct_mpro_category_add.html");
        }else{
            $sort=intval(safeString($_POST['category_sort']));
        }

        if(empty($_POST['category_name'])){
            showMessage('分类名称不能为空!');
        }else{
            $name=safeString($_POST['category_name'],"admin_cproduct_mpro_category_add.html");
        }

        $category=intval(safeString($_POST['category']));
        $getCategory_m=M('category');
        if($getCategory_m->category_add($sort,$name,$category)){
            showMessage('分类添加成功！','admin_cproduct_mpro_category_list.html');
        }else{
            showMessage('分类添加失败！','admin_cproduct_mpro_category_list.html');
        }
    }

    /**
     * 编辑产品分类逻辑
     * @return  
     */
    public  function pro_category_edit(){
        $id=intval($_GET['id']);
        if(empty($_POST['submit'])){
            $category_m=M("category");
            $categoryInfo=$category_m->getCategoryInfo($id);
            $rows=$category_m->getCategory();
            $category=$category_m->getParentCategory(
                $rows,$id);
            VIEW::assign('category',$category);
            VIEW::assign("categoryInfo",$categoryInfo);
            VIEW::display("product/pro_category_edit.html");
        }else{
            $this->pro_category_edit_do($id);
        }
    }

    /**
     * 编辑产品分类具体操作
     * @param  integer $id 
     * @return      
     */
    public function pro_category_edit_do($id){
        if(empty($_POST['category_sort'])){
            showMessage('排序不能为空！',"admin_cproduct_mpro_category_edit_i".$id.".html");
        }else{
            $sort=intval(safeString($_POST['category_sort']));
        }

        if(empty($_POST['category_name'])){
            showMessage('分类名不能为空！',"admin_cproduct_mpro_category_edit_i".$id.".html");
        }else{
            $name=safeString($_POST['category_name']);
        }
        $category=intval(safeString($_POST['category']));
        $category_m=M('category');
        if($category_m->pro_category_edit($sort,$name,$category,$id)){
            showMessage('分类编辑成功！',"admin_cproduct_mpro_category_list.html");
        }else{
            showMessage('分类编辑失败！',"admin_cproduct_mpro_category_edit_i".$id.".html");
        }
    }

    /**
     * 删除分类
     * @return  
     */
    public function pro_category_delete(){
        $id=intval($_GET['id']);
        $category_m=M('category');
        $childIds=$category_m->getCategoryIds($id);
        if($category_m->pro_category_delete($childIds)){
            showMessage('分类删除成功！',"admin_cproduct_mpro_category_list.html");
        }else{
            showMessage('分类删除失败！',"admin_cproduct_mpro_category_list.html");
        }

    }

    
}