<?php
namespace Portal\Model;

use Common\Model\CommonModel;

class ProductRelationshipsModel extends CommonModel {
	
	protected function _before_write(&$data) {
		parent::_before_write($data);
	}
	
}