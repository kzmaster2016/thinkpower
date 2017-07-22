<?php
namespace Portal\Service;
use Think\Model\RelationModel;

class ArticleService extends RelationModel{

	public function articlelist($cid){
		$term_id=$cid;
	    $term_ids=sp_get_all_child_terms($term_id);
		$term=sp_get_term($term_id);
		if(empty($term)){
		    header('HTTP/1.1 404 Not Found');
		    header('Status:404 Not Found');
		    if(sp_template_file_exists(MODULE_NAME."/404")){
		        $this->display(":404");
		    }
		    return;
		}

		$terms=sp_get_all_child_terms($term_id); //关联数组
	
		$arrTerms=Array(); // 索引数组
		foreach ($terms as $value) {
			$arrTerms[]=$value['term_id'];
		}
		// var_dump($arrTerms);

		$arrTerms[]=$term_id;
		$strTerms=implode(",",$arrTerms);
		// echo $strTerms;

		$lists = sp_sql_posts_paged("cid:$strTerms;order:post_date DESC;",10);
		// dump($lists);

    	// $this->assign($term);
    	// $this->assign('cat_id', $strTerms);
    	// $this->assign('lists', $lists);

    	return Array('term'=>$term,'cat_id'=>$strTerms,'lists'=>$lists);
	   
	}
}

?>	
