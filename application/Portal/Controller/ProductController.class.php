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
	public function index(){
		$this->display('productList');
	}
	public function productList(){
		$this->display();
	}
	public function detail(){
		$this->display();
	}
}
	 

