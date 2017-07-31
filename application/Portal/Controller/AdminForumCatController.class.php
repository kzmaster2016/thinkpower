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

class AdminForumCatController extends AdminbaseController {

	protected $terms_model;
 
	function _initialize() {
		parent::_initialize();
		$this->terms_model = D("Portal/ForumCat");
		 
	}
	
	// 后台文章分类列表
    public function index(){
		$result = $this->terms_model->order(array("listorder"=>"asc"))->select();
		
	
		$this->display();
	}
	
	 
	

	// 文章分类添加
	public function add(){
	 	$parentid = I("get.parent",0,'intval');
	  
	 	$terms = $this->terms_model->order(array("path"=>"asc"))->select();
	 	
	 	 
	 	$this->assign("parent",$parentid);
	 	$this->display();
	}
	
	// 文章分类添加提交
	public function add_post(){
		if (IS_POST) {
			if ($this->terms_model->create()!==false) {
				if ($this->terms_model->add()!==false) {
				    F('all_terms',null);
					$this->success("添加成功！",U("AdminForumCat/index"));
				} else {
					$this->error("添加失败！");
				}
			} else {
				$this->error($this->terms_model->getError());
			}
		}
	}
	
	// 文章分类编辑
	public function edit(){
		$id = I("get.id",0,'intval');
		$data=$this->terms_model->where(array("term_id" => $id))->find();
	 
		$this->assign("data",$data);
		$this->display();
	}
	
	// 文章分类编辑提交
	public function edit_post(){
		if (IS_POST) {
			if ($this->terms_model->create()!==false) {
				if ($this->terms_model->save()!==false) {
				    F('all_terms',null);
					$this->success("修改成功！");
				} else {
					$this->error("修改失败！");
				}
			} else {
				$this->error($this->terms_model->getError());
			}
		}
	}
	
	// 文章分类排序
	public function listorders() {
		$status = parent::_listorders($this->terms_model);
		if ($status) {
			$this->success("排序更新成功！");
		} else {
			$this->error("排序更新失败！");
		}
	}
	
	// 删除文章分类
	public function delete() {
		$id = I("get.id",0,'intval');
		$count = $this->terms_model->where(array("parent" => $id))->count();
		
		if ($count > 0) {
			$this->error("该菜单下还有子类，无法删除！");
		}
		
		if ($this->terms_model->delete($id)!==false) {
			$this->success("删除成功！");
		} else {
			$this->error("删除失败！");
		}
	}

 
 
 
 
 
}