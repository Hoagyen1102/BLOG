<?php
class category_repository {
	private static $repo = null;
    
	public static function getAllRecords(){
		$category = category_model::getInstance();
		$categories = $category->getAllRecords();
		return $categories;
    }    
}
?>