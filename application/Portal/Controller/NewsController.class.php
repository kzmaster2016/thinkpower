<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomebaseController;

class NewsController extends HomebaseController {

	// 前台文章列表
	public function index(){
	    // $term_id=I('get.id',0,'intval');
	    $term_id=1;
	    $term_ids=sp_get_all_child_terms($term_id);
		$term=sp_get_term($term_id);
		if(empty($term)){
		    header('HTTP/1.1 404 Not Found');
		    header('Status:404 Not Found');
		    if(sp_template_file_exists(MODULE_NAME."/404")){
		        $this->display(":404");
		    }
		    return;
		}

		$terms=sp_get_all_child_terms($term_id); //关联数组
	
		$arrTerms=Array(); // 索引数组
		foreach ($terms as $value) {
			$arrTerms[]=$value['term_id'];
		}
		// var_dump($arrTerms);

		$arrTerms[]=$term_id;
		$strTerms=implode(",",$arrTerms);
		// echo $strTerms;

		$lists = sp_sql_posts_paged("cid:$strTerms;order:post_date DESC;",10);
		// dump($lists);

    	$this->assign($term);
    	$this->assign('cat_id', $strTerms);
    	$this->assign('lists', $lists);


	    $tplname=$term["list_tpl"];
	    $tplname=sp_get_apphome_tpl($tplname,"list");
	    $this->display(":$tplname");
    	 	 
	}

	//文章详情页
	public function article(){
		$article_id=I('get.id',0,'intval');
    	$term_id=I('get.cid',0,'intval');
    	
    	$posts_model=M("Posts");

    	$article=$posts_model
    	->alias("a")
    	->field('a.*,c.user_login,c.user_nicename,b.term_id')
    	->join("__TERM_RELATIONSHIPS__ b ON a.id = b.object_id")
		->join("__USERS__ c ON a.post_author = c.id")
		->where(array('a.id'=>$article_id,'b.term_id'=>$term_id))
		->find();	
    	// dump($article);

    	if(empty($article)){
    	    header('HTTP/1.1 404 Not Found');
    	    header('Status:404 Not Found');
    	    if(sp_template_file_exists(MODULE_NAME."/404")){
    	        $this->display(":404");
    	    } 	    
    	    return;
    	}
    	
    	$terms_model= M("Terms");
    	$term=$terms_model->where(array('term_id'=>$term_id))->find();
    	
    	$posts_model->where(array('id'=>$article_id))->setInc('post_hits');
    	
    	$article_date=$article['post_date'];
    	
    	$join = '__POSTS__ as b on a.object_id =b.id';
    	$join2= '__USERS__ as c on b.post_author = c.id';
    	
    	$term_relationships_model= M("TermRelationships");
    	
    	$next=$term_relationships_model
    	->alias("a")
    	->join($join)->join($join2)
    	->where(array('b.id'=>array('gt',$article_id),"post_date"=>array("egt",$article_date),"a.status"=>1,'a.term_id'=>$term_id,'post_status'=>1))
    	->order("post_date asc,b.id asc")
    	->find();
    	
    	$prev=$term_relationships_model
    	->alias("a")
    	->join($join)->join($join2)
    	->where(array('b.id'=>array('lt',$article_id),"post_date"=>array("elt",$article_date),"a.status"=>1,'a.term_id'=>$term_id,'post_status'=>1))
    	->order("post_date desc,b.id desc")
    	->find();
    	
    	$this->assign("next",$next);
    	$this->assign("prev",$prev);
    	
    	$smeta=json_decode($article['smeta'],true);
    	$content_data=sp_content_page($article['post_content']);
        $article['post_content']=$content_data['content'];
    	// $article['test']='kuangzheng32134';   //测试获取数据
    	
    	$this->assign("page",$content_data['page']);
    	$this->assign($article);   //这样输出没有别名，那么模板获取变量就可以不用带article
    	$this->assign("smeta",$smeta);
    	$this->assign("term",$term);
    	$this->assign("article_id",$article_id);
    	
    	$tplname=$term["one_tpl"];
    	$tplname=empty($smeta['template'])?$tplname:$smeta['template'];
    	$tplname=sp_get_apphome_tpl($tplname, "article");	
    	$this->display(":$tplname");

	}
	
	// 文章分类列表接口,返回文章分类列表,用于后台导航编辑添加
	public function nav_index(){
		$navcatname="文章分类";
        $term_obj= M("Terms");

        $where=array();
        $where['status'] = array('eq',1);
        $terms=$term_obj->field('term_id,name,parent')->where($where)->order('term_id')->select();
		$datas=$terms;
		$navrule = array(
		    "id"=>'term_id',
            "action" => "Portal/List/index",
            "param" => array(
                "id" => "term_id"
            ),
            "label" => "name",
		    "parentid"=>'parent'
        );
		return sp_get_nav4admin($navcatname,$datas,$navrule) ;
	}
}
