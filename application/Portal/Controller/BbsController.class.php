<?php
/*
  Author: kz 
*/


// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
use Portal\Service\ArticleService;
/**
 * 首页
 */
class BbsController extends HomebaseController {
	
    //首页 
	public function index() {
        $forumCat=M('ForumCat')->where(array("status"=>1))->order('listorder asc,time desc')->select();
        $forumList=array();

		foreach ($forumCat as $key => $value) {

            $forumItem=M('Forum')->alias('a')->where(array("status"=>1,"cid"=>$value['id']))
            ->join('__USERS__ b ON b.id = a.uid')         
            ->order('listorder asc,time desc')
            ->field('a.*,b.user_nicename as uname')
            ->select();
            // $forumItem['user'] =M('Users')->where(array("status"=>1,"id"=>$forumItem[0]['uid']))->select();         
            $forumList[$value['name']] = $forumItem;
            
        }

        // dump($forumList);
        $this->assign("forumList",$forumList);
    	$this->display("index");

    }
    public function topicList() {
        $forumId=I('forumid'); // 获取forumid
        $forum=M('Forum')->alias('a')->where(array("a.status"=>1,"a.id"=>$forumId))
            ->join('__USERS__ b ON b.id = a.uid')         
            ->order('listorder asc,time desc')
            ->field('a.*,b.user_nicename as uname')
            ->find();

        $topicList=M('Topic')->alias('a')->where(array("a.status"=>1,"a.cid"=>$forumId,'type'=>1))
            ->join('__USERS__ b ON b.id = a.uid')         
            ->order('listorder asc,time desc')
            ->field('a.*,b.user_nicename as uname')
            ->select();

        $announceList=M('Topic')->alias('a')->where(array("a.status"=>1,"a.cid"=>$forumId,'type'=>2))
            ->join('__USERS__ b ON b.id = a.uid')         
            ->order('listorder asc,time desc')
            ->field('a.*,b.user_nicename as uname')
            ->select();

       // dump($forum);

        $this->assign('forum',$forum);
        $this->assign('topicList',$topicList);
        $this->assign('announceList',$announceList);
        $this->display();
    }

    public function topicDetail() {

         

        $this->display();
    }

    

    public function post_topic(){
        if (IS_POST) {
             
            $_POST['post']['cid']=$_POST['cid'];
            $_POST['post']['type']=1;  //topics
            $_POST['post']['time']=date('Y-m-d H:i:s');
            $_POST['post']['uid']=$_POST['uid'];
            $_POST['post']['name']=$_POST['name'];

            $topic = $_POST['post'];             
            $result = M('Topic')->add($topic);
            if ($result) {               
                $this->success("Add topic successfully!");
            } else {
                $this->error("Add topic failure!");
            }
        }
    }

}


