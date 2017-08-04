<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Tuolaji <479923197@qq.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;

use Common\Controller\AdminbaseController;

class AdminForumController extends AdminbaseController {

	protected $posts_model;
	protected $terms_model;

	function _initialize() {
		parent::_initialize();
		$this->posts_model = D("Portal/Forum");
		$this->terms_model = D("Portal/ForumCat");
	}

	// 后台管理列表
	public function index(){
		$this->_lists(array("a.status"=>array('neq',3)));
		$this->_getTree();
		$this->display();
	}



	// 添加
	public function add(){
		$terms = $this->terms_model->order(array("listorder"=>"asc"))->select();
		$term_id = I("get.term",0,'intval');
		$this->_getTermTree();
		$term=$this->terms_model->where(array('id'=>$term_id))->find();
		$this->assign("term",$term);
		$this->assign("terms",$terms);
		$this->display();
	}

 

	// 或产品添加提交
	public function add_post(){
		if (IS_POST) {
			if(empty($_POST['cid'])){
				$this->error("请至少选择一个分类！");
			}
	 
			$_POST['post']['uid']=get_current_admin_id();
			$_POST['post']['cid']=$_POST['cid'];
			$product = $_POST['post'];
			 		 
			$result = $this->posts_model->add($product);
			if ($result) {
				 
				$this->success("添加成功！");
			} else {
				$this->error("添加失败！");
			}

		}
	}

	// 编辑
	public function edit(){
		$id=  I("get.id",0,'intval');

		$post = $this->posts_model->where(array("id"=>$id))->select();
		$term_id = I("get.term",0,'intval');

		// dump($post);
		$this->_getTermTree();
		$term=$this->terms_model->where(array('id'=>$term_id))->find();
		$this->assign("term",$term);
		$this->assign("post",$post[0]);
		$this->display();
	}


	// 或产品编辑提交
	public function edit_post(){
		if (IS_POST) {
			if(empty($_POST['cid'])){
				$this->error("请至少选择一个分类！");
			}
	 
			$_POST['post']['uid']=get_current_admin_id();
			$_POST['post']['cid']=$_POST['cid'];
			$product = $_POST['post'];
			 		 
			$result = $this->posts_model->save($product);
			if ($result) {
				 
				$this->success("添加成功！");
			} else {
				$this->error("添加失败！");
			}
		}
	}

	// 排序
	public function listorders() {
		$status = parent::_listorders($this->posts_model);
		if ($status) {
			$this->success("排序更新成功！");
		} else {
			$this->error("排序更新失败！");
		}
	}

	/**
	 * 列表处理方法,根据不同条件显示不同的列表
	 * @param array $where 查询条件
	 *b: forumcat表
	 *c: users
	 */
	private function _lists($where=array()){
		$term_id=I('request.term',0,'intval');
	      
		if(!empty($term_id)){
		    $where['b.id']=$term_id;
			$term=$this->terms_model->where(array('id'=>$term_id))->find();
			$this->assign("term",$term);
		}

		
		$keyword=I('request.keyword');
		if(!empty($keyword)){
		    $where['a.name']=array('like',"%$keyword%");
		}

		$this->posts_model
		->alias("a")
		->where($where);

		if(!empty($term_id)){
		    $this->posts_model->join("__FORUM_CAT__ b ON a.cid = b.id");
		}

		$count=$this->posts_model->count();

		$page = $this->page($count, 20);

		$this->posts_model
		->alias("a")
		->join("__USERS__ c ON a.uid = c.id")

		->where($where)
		->limit($page->firstRow , $page->listRows)
		->order("a.time DESC")
		->join("__FORUM_CAT__ b ON a.cid = b.id");

		
		$forums=$this->posts_model
		->field('a.*,c.user_login,c.user_nicename,b.name as term_name')
		->select();
		// dump($forums);
		 

		$this->assign("page", $page->show('Admin'));
		$this->assign("formget",array_merge($_GET,$_POST));
		$this->assign("posts",$forums);
	}


	// 获取分类树结构 select 形式
	private function _getTree(){
		$term_id=empty($_REQUEST['term'])?0:intval($_REQUEST['term']);
		$result = $this->terms_model->order(array("listorder"=>"asc"))->select();

		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("AdminForumCat/add", array("parent" => $r['term_id'])) . '">添加子类</a> | <a href="' . U("AdminForumCat/edit", array("id" => $r['term_id'])) . '">修改</a> | <a class="js-ajax-delete" href="' . U("AdminForumCat/delete", array("id" => $r['term_id'])) . '">删除</a> ';
			$r['visit'] = "<a href='#'>访问</a>";
			$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
			$r['id']=$r['id'];
			$r['parentid']=$r['parent'];
			$r['selected']=$term_id==$r['id']?"selected":"";
			$array[] = $r;
		}

		$tree->init($array);
		$str="<option value='\$id' \$selected>\$spacer\$name</option>";
		$taxonomys = $tree->get_tree(0, $str);
		$this->assign("taxonomys", $taxonomys);
	}



	// 获取分类树结构
	private function _getTermTree($term=array()){

		$term_id=empty($_REQUEST['cid'])?0:intval($_REQUEST['cid']);
		
		$result = $this->terms_model->order(array("listorder"=>"asc"))->select();

		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("AdminForumCat/add", array("parent" => $r['term_id'])) . '">添加子类</a> | <a href="' . U("AdminForumCat/edit", array("id" => $r['term_id'])) . '">修改</a> | <a class="js-ajax-delete" href="' . U("AdminForumCat/delete", array("id" => $r['term_id'])) . '">删除</a> ';
			$r['visit'] = "<a href='#'>访问</a>";
			$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
			$r['id']=$r['id'];
			$r['parentid']=$r['parent'];
			$r['selected']=$term_id==$r['id']?"selected":"";
			$r['checked'] =in_array($r['term_id'], $term)?"checked":"";
			$array[] = $r;
		}

		$tree->init($array);
		$str="<option value='\$id' \$selected>\$spacer\$name</option>";
		$taxonomys = $tree->get_tree(0, $str);
		$this->assign("taxonomys", $taxonomys);
	}

	// 删除
	public function delete(){
		if(isset($_GET['id'])){
			$id = I("get.id",0,'intval');
			if ($this->posts_model->where(array('id'=>$id))->delete() !==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}

		if(isset($_POST['ids'])){
			$ids = I('post.ids/a');

			if ($this->posts_model->where(array('id'=>array('in',$ids)))->delete()!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}

	// 审核
	public function check(){
		if(isset($_POST['ids']) && $_GET["check"]){
		    $ids = I('post.ids/a');

			if ( $this->posts_model->where(array('id'=>array('in',$ids)))->save(array('status'=>1)) !== false ) {
				$this->success("审核成功！");
			} else {
				$this->error("审核失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["uncheck"]){
		    $ids = I('post.ids/a');

			if ( $this->posts_model->where(array('id'=>array('in',$ids)))->save(array('status'=>0)) !== false) {
				$this->success("取消审核成功！");
			} else {
				$this->error("取消审核失败！");
			}
		}
	}

	// 置顶
	public function top(){
		if(isset($_POST['ids']) && $_GET["top"]){
			$ids = I('post.ids/a');

			if ( $this->posts_model->where(array('id'=>array('in',$ids)))->save(array('istop'=>1))!==false) {
				$this->success("置顶成功！");
			} else {
				$this->error("置顶失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["untop"]){
		    $ids = I('post.ids/a');

			if ( $this->posts_model->where(array('id'=>array('in',$ids)))->save(array('istop'=>0))!==false) {
				$this->success("取消置顶成功！");
			} else {
				$this->error("取消置顶失败！");
			}
		}
	}

}