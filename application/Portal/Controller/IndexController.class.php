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
class IndexController extends HomebaseController {
	
    //首页 小夏是老猫除外最帅的男人了
	public function index() {

		$listResult=new ArticleService();
        $result=$listResult->articlelist(6);

    	$this->assign($result['term']);
    	$this->assign('cat_id', $result['strTerms']);
    	$this->assign('lists', $result['lists']);

    	$this->display(":index");
    }

    public function contact() {
    	$this->display(":contact");
    }

}


