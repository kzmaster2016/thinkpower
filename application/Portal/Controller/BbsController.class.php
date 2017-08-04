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

    function _initialize() {
        parent::_initialize();
        
        $this->commonList();

    }
	
    //首页 
	public function index() {
        

    	$this->display("index");

    }
    public function topicList() {
        $forumId=I('forumid'); // 获取forumid
        $forum=M('Forum')->alias('a')->where(array("a.status"=>1,"a.id"=>$forumId))
            ->join('__USERS__ b ON b.id = a.uid')         
            ->order('listorder asc,time desc')
            ->field('a.*,b.user_nicename as uname')
            ->find();

        $totalsize=M('Topic')->alias('a')->where(array("a.status"=>1,"a.cid"=>$forumId,'type'=>1))
            ->join('__USERS__ b ON b.id = a.uid')         
            ->count();

        $pagetpl = '{first}{prev}{liststart}{list}{listend}{next}{last}';
        
        $page_param = C("VAR_PAGE");
        $page = new \Page($totalsize,10);
        $page->setLinkWraper("li");
        $page->__set("PageParam", $page_param);

        if(sp_is_mobile()){
            $pagesetting= array("listlong" => "2", "prev" => "prev", "next" => "next", "list" => "*", "disabledclass" => "");
        }else{
            $pagesetting=array("listlong" => "4", "first" => "first", "last" => "last", "prev" => "prev", "next" => "next", "list" => "*", "disabledclass" => "");
        }
        $page->SetPager('default', $pagetpl,$pagesetting);
       



        $topicList=M('Topic')->alias('a')->where(array("a.status"=>1,"a.cid"=>$forumId,'type'=>1))
            ->join('__USERS__ b ON b.id = a.uid')         
            ->order('listorder asc,time desc')
            ->field('a.*,b.user_nicename as uname')
            ->limit($page->firstRow, $page->listRows)
            ->select();
           

        $announceList=M('Topic')->alias('a')->where(array("a.status"=>1,"a.cid"=>$forumId,'type'=>2))
            ->join('__USERS__ b ON b.id = a.uid')         
            ->order('listorder asc,time desc')
            ->field('a.*,b.user_nicename as uname')
            ->select();

         
        $page=$page->show('default');

        $this->assign('forum',$forum);
        $this->assign('topicList',$topicList);
        $this->assign('announceList',$announceList);

        $this->assign('page',$page);

        $this->display();
    }

    public function topicDetail() {
        $topicId=I('topicid'); // 获取topicid

        

        $topic=M('Topic')->alias('a')->where(array("a.status"=>1,"a.id"=>$topicId))
            ->join('__USERS__ b ON b.id = a.uid')         
            ->order('listorder asc,time desc')
            ->field('a.*,b.user_nicename as uname')
            ->find();
        $forum=M('Forum')->where(array('id'=>$topic['cid']))->find();

        $totalsize=M('Reply')->alias('a')->where(array("a.status"=>1,"a.tid"=>$topicId))
            ->join('__USERS__ b ON b.id = a.uid')      
            ->count();

        $pagetpl = '{first}{prev}{liststart}{list}{listend}{next}{last}';
        
        $page_param = C("VAR_PAGE");
        $page = new \Page($totalsize,10);
        $page->setLinkWraper("li");
        $page->__set("PageParam", $page_param);

        if(sp_is_mobile()){
            $pagesetting= array("listlong" => "2", "prev" => "prev", "next" => "next", "list" => "*", "disabledclass" => "");
        }else{
            $pagesetting=array("listlong" => "4", "first" => "first", "last" => "last", "prev" => "prev", "next" => "next", "list" => "*", "disabledclass" => "");
        }
        $page->SetPager('default', $pagetpl,$pagesetting);


        $replyList=M('Reply')->alias('a')->where(array("a.status"=>1,"a.tid"=>$topicId))
            ->join('__USERS__ b ON b.id = a.uid')         
            ->order('type desc,time desc')
            ->field('a.*,b.user_nicename as uname,b.create_time as utime')
            ->limit($page->firstRow, $page->listRows)
            ->select();

        $page=$page->show('default');
        $this->assign('topic',$topic);
        $this->assign('forum',$forum);
        $this->assign('replyList',$replyList);
        $this->assign('page',$page);
        $this->display();
         
    }

    public function commonList(){
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

         
        $this->assign("forumList",$forumList);

        $newTopics = M('Topic')->alias('a')->where(array('a.status'=>1))->join('__USERS__ b ON b.id = a.uid')
        ->field('a.*,b.user_nicename as uname')
        ->order('time desc')
        ->limit(6)->select();

        // dump($newTopics);
        $this->assign('newTopics',$newTopics);
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

     public function post_reply(){
        if (IS_POST) {
             
            $_POST['post']['tid']=$_POST['tid'];
            $_POST['post']['type']=1;  //前台用户的reply
            $_POST['post']['time']=date('Y-m-d H:i:s');
            $_POST['post']['uid']=$_POST['uid'];
            $_POST['post']['title']=$_POST['title'];
            $_POST['post']['content']=$_POST['content'];

            $reply = $_POST['post'];             
            $result = M('Reply')->add($reply);
            if ($result) {               
                $this->success("Add reply successfully!");
            } else {
                $this->error("Add reply failure!");
            }
        }
    }

}


