<?php
class home_controller extends vendor_main_controller {
	public function index() {
		$comments = comment_model::getInstance();
		$marks = mark_model::getInstance();
		$records = post_repository::getAllRecordPublished();
		$topRecord = post_repository::getTopRecord();
		if($records) {
			$cmt = post_repository::getCounts($records,$comments);
			$mark = post_repository::getCounts($records,$marks);
			$this->setProperty('cmt',$cmt);
			$this->setProperty('mark',$mark);		
		}
		$this->setProperty('record',$records);
		$this->setProperty('topRecord',$topRecord);
		$this->display();
	} 
}
?>