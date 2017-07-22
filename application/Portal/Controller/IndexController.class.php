<?php
/*
  Author: kz 
*/


// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
/**
 * 首页
 */
class IndexController extends HomebaseController {
	
    //首页 小夏是老猫除外最帅的男人了
	public function index() {
    	$this->display(":index");
    }

    public function contact() {
    	$this->display(":contact");
    }

}


