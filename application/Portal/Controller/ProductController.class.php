<?php
// +----------------------------------------------------------------------
/*
	产品展示：
	author:kz
*/
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomebaseController;

class ProductController extends HomebaseController {
	protected $productCat_model;

	function _initialize() {
		parent::_initialize();
		$this->productCat_model = D("Portal/ProductCat");
	}

	public function index(){
		$this->productList();
	}
	public function productList(){
		$term_id=I('get.term_id',0,'intval');
		$term_ids=sp_get_all_child_productCat($term_id);
		$term=sp_get_productCat($term_id);
		if(empty($term)){
		    header('HTTP/1.1 404 Not Found');
		    header('Status:404 Not Found');
		    if(sp_template_file_exists(MODULE_NAME."/404")){
		        $this->display(":404");
		    }
		    return;
		}
	
		$arrproductCat=Array(); // 索引数组
		$arrproductCat[]=$this->getList($term_id);
		foreach ($term_ids as $value) {
			$arrproductCat[]=$this->getList($value['term_id']);
		}
		// dump($arrproductCat);
		
		$productCatNav = $this->productCat_model->where(array("parent"=>0))->order(array("listorder"=>"asc"))->select();
		$productCatItem = $this->productCat_model->where(array("term_id"=>$term_id))->order(array("listorder"=>"asc"))->select();

		$this->assign("productCatNav",$productCatNav);  //产品以及分类导航
		$this->assign("productCatItem",$productCatItem[0]);  //当前产品分类信息
		$this->assign("arrproductCat",$arrproductCat);  //当前产品分类信息
		$this->display();
	}
	public function detail(){

		$article_id=I('get.id',0,'intval');	
    	$posts_model=M("Product");

    	$article=$posts_model->where(array('id'=>$article_id))->find();	

    	// dump($article);

    	if(empty($article)){
    	    header('HTTP/1.1 404 Not Found');
    	    header('Status:404 Not Found');
    	    if(sp_template_file_exists(MODULE_NAME."/404")){
    	        $this->display(":404");
    	    } 	    
    	    return;
    	}   	
    	$posts_model->where(array('id'=>$article_id))->setInc('post_hits'); 	//统计点击次数
    	
    	$smeta=json_decode($article['smeta'],true);
    	$content_data=sp_content_page($article['post_content']);
        $article['post_content']=$content_data['content'];
    	// $article['test']='kuangzheng32134';   //测试获取数据
    	
    	// $this->assign("page",$content_data['page']);
    	$this->assign($article);   //这样输出没有别名，那么模板获取变量就可以不用带article
    	$this->assign("smeta",$smeta);
     
    	$this->assign("article_id",$article_id);

		$this->display();
	}

	public function getList($cid){
		$content=array();
		$productCat=M('product_cat')->where(array('term_id' =>$cid))->select();
		$content['cat']=$productCat;
		$productIds=M('product_relationships')->where(array('term_id' =>$cid))->order(array("listorder"=>"asc"))->field('object_id')->select();
		// dump($productIds);
		$arrObjectIds=Array();
		foreach ($productIds as $key => $value) {
			$arrObjectIds[]=$value["object_id"];
		}
		$ObjectIds=implode(",",$arrObjectIds);
		$productList=M('product')->where(array('id' => array('in',$ObjectIds)))->order('post_date DESC')->select();

		$content['product']=$productList;
		return $content;

	}
}
	 

