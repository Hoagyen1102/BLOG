<?php
class posts_controller extends vendor_main_controller {
	public function index() {
		$this->checkAuth();
		$record = post_repository::getRecordByUserID();
		$this->setProperty('record',$record);
		$this->display();
	} 
	
	public function view($slug) {
		$comments = comment_model::getInstance();
		$marks = mark_model::getInstance();

		$record = post_repository::upViews($slug);
		$cmt = post_repository::getCount($record,$comments);
		$mark = post_repository::getCount($record,$marks);
		$listComment = comment_repository::getRecordByPostId($record);	
		$hasLike = like_repository::checkLike($record['id'],'1');
		$listLike = like_repository::listCmtLikeByUser();
		
		$this->setProperty('record',$record);
		$this->setProperty('cmt',$cmt);
		$this->setProperty('mark',$mark);
		$this->setProperty('listComment',$listComment);
		$this->setProperty('hasLike',$hasLike);
		$this->setProperty('listLike',$listLike);
		$this->display();
	}
	
	public function add() {
		$this->checkAuth();
		$this->categories = category_model::getInstance()->getAllRecords();
		if(isset($_POST['btn-submit'])||isset($_POST['btn-save-draft'])) {
			$post = $_POST['post'];
			$post['user_id'] = $_SESSION['user']['id'];
			$post['slug'] = vendor_app_util::to_slug($post['title']).'-'.date('d-m-y-h-i-s');
			$post['status'] = isset($_POST['btn-submit'])?  1 : 0;
			$addpost = post_model::getInstance();
			if($addpost->addRecord($post))
				header( "Location: ".vendor_app_util::url(array('ctl'=>'posts')));
        }
		$this->display();
	}

	public function edit($slug) {
		$this->checkAuth();
		$checkPermission = post_repository::checkPermission($slug);
		$categories = category_repository::getAllRecords();
		$record = post_repository::getRecordBySlug($slug);

		if($checkPermission){
			if(isset($_POST['btn-submit']) || isset($_POST['btn-save-draft'])) {
				$post = $_POST['post'];
				$post['user_id'] = $_SESSION['user']['id'];
				$post['status'] = isset($_POST['btn-submit'])?  1 : 0;
				$post['slug'] = vendor_app_util::to_slug($post['title']).'-'.date('d-m-y-H-i-s', strtotime($record['created']));
				$editpost = post_model::getInstance();
				if($editpost->editRecord($record['id'],$post))
					header( "Location: ".vendor_app_util::url(array('ctl'=>'posts')));
			}
			$this->setProperty('record',$record);
			$this->setProperty('categories',$categories);
			$this->display();	
		}else{
			header( "Location: ".vendor_app_util::url(array('ctl'=>'staticpages')));
		}
	}
	
	public function delete($id) {
		$post = post_model::getInstance();
		$record = $post->getRecord($id);
		echo $post->delRecord($id);
		exit();
	}
}
?>