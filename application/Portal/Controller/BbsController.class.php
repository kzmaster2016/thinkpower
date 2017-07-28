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
	
    //首页 小夏是老猫除外最帅的男人了
	public function index() {

		 

    	$this->display("index");
    }
    public function topicList() {

         

        $this->display();
    }

    public function topicDetail() {

         

        $this->display();
    }

    public function contact() {
    	$this->display(":contact");
    }

}


