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

class AdminReplyController extends AdminbaseController {

	protected $terms_model;

	function _initialize() {
		parent::_initialize();
		$this->topic_model = D("/Portal/Topic");
		$this->reply_model = D("/Portal/Reply");
		$this->user_model = D("/Portal/Reply");
	}

	// 后台话题回复列表
    public function index(){
      $topics = $this->topic_model->order(array("listorder"=>"asc"))->select();

      $this->assign("topics", $topics);
      $term_id=I('request.term',0,'intval');

		if(!empty($term_id)){
		    $where['a.tid']=$term_id;
			$term=$this->topic_model->where(array('id'=>$term_id))->find();
			$this->assign("term",$term);
		}

		$start_time=I('request.start_time');
		if(!empty($start_time)){
		    $where['time']=array(
		        array('EGT',$start_time)
		    );
		}

		$end_time=I('request.end_time');
		if(!empty($end_time)){
		    if(empty($where['time'])){
		        $where['time']=array();
		    }
		    array_push($where['time'], array('ELT',$end_time));
		}

		$keyword=I('request.keyword');
		if(!empty($keyword)){
		    $where['content']=array('like',"%$keyword%");
		}

		$this->reply_model
		->alias("a")
		->where($where);

		if(!empty($term_id)){
		    $this->reply_model->join("__TOPIC__ b ON a.tid = b.id");
		}

		$count=$this->reply_model->count();

		$page = $this->page($count, 20);

		$this->reply_model
		->alias("a")
		->join("__USERS__ c ON a.uid = c.id")
		->where($where)
		->limit($page->firstRow , $page->listRows)
		->order("a.time DESC");

	    $this->reply_model->field('a.*,c.user_login,c.user_nicename,b.name as name');
	    $this->reply_model->join("__TOPIC__ b ON a.tid = b.id");
	
		$posts=$this->reply_model->select();

		$this->assign("posts", $posts);
        $this->display();
	}




	// 话题回复添加
	public function add(){
		$topics = $this->topic_model->order(array("listorder"=>"asc"))->select();
        $this->assign("topics", $topics);
	 	$this->display();
	}

	// 话题回复添加提交
	public function add_post(){
		if (IS_POST) {
			$reply = $_POST['post'];
			$smeta = $_POST['smeta'];
			$reply['introduce'] = '';
			$reply['uid'] = 1;
			$reply['content'] = htmlspecialchars_decode($reply['content']);
			$reply['smeta'] = json_encode($smeta);
			try{
				$result = $this->reply_model->add($reply);
				if (result) {
				  $this->success("添加成功！",U("AdminReply/index"));
				} else {
					$this->error("添加失败");
				}
			}catch(Exception $e){
				$this->error($e->getMessage());
			}
		}
	}

	// 话题回复编辑
	public function edit(){
		$id=  I("get.id",0,'intval');
		$topics = $this->topic_model->order(array("listorder"=>"asc"))->select();
		$posts = $this->reply_model->where("id=$id")->find();
		$users_model=M("Users");
		$uid = $posts['uid'];
		$user = $users_model->where("id=$uid")->find();
        $this->assign("topics", $topics);
        $this->assign("post", $posts);
        $this->assign("user", $user);
        $smeta = json_decode($posts['smeta'], true);
        $this->assign("smeta", $smeta);
	 	$this->display();
	}

	// 话题回复编辑提交
	public function edit_post(){
		if (IS_POST) {
			$reply = $_POST['post'];
			$smeta = $_POST['smeta'];
			$reply['content']=htmlspecialchars_decode($reply['content']);
			$reply['smeta'] = json_encode($smeta);
			$result=$this->reply_model->save($reply);
			if ($result!==false) {
				$this->success("保存成功！");
			} else {
				$this->error("保存失败！");
			}
		}
	}

	// 话题回复删除
	public function delete() {
		if(isset($_GET['id'])){
			$id = I("get.id",0,'intval');
			if ($this->reply_model->where(array('id'=>$id))->delete()!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}

		if(isset($_POST['ids'])){
			$ids = I('post.ids/a');

			if ($this->reply_model->where(array('id'=>array('in',$ids)))->delete()!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}

}