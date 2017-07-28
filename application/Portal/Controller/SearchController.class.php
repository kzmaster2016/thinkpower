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

class SearchController extends HomebaseController {
    
    //搜索结果页面
    public function index() {
		$keyword = I('request.keyword/s','');
		
		if (empty($keyword)) {
			$this -> error("Keywords couldn't be empty! Please re-enter!");
		}
		
		$this -> assign("keyword", $keyword);
		$this -> display(":search");
    }
    
}
