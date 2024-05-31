<?php
class comments_controller extends vendor_main_controller {
	public function index() {
	} 
	
	public function add($array) {
		try{
			$this->checkAuth();
			$comment = comment_repository::addComment($array);
			$addComment = comment_repository::getLastRecord();
			echo json_encode(['success' => true, 'comment' => $addComment]);
			exit();
		} catch (Exception $e) {
			echo 'Có lỗi xảy ra: ' . $e->getMessage();
		}
	}

	public function edit($id) {
		$this->checkAuth();
		try{
			$comment = comment_repository::editComment($id);
			$editComment = comment_repository::getRecordByID($id);
			echo json_encode(['success' => true, 'comment' => $editComment]);
			exit();
		} catch (Exception $e) {
			echo 'Có lỗi xảy ra: ' . $e->getMessage();
		}
	}
	
	public function delete($id) {
		$post = post_repository::getRecordByID($id);
		$comment = comment_repository::deleteComment($id);
		echo json_encode(['success' => true, 'comment' => $comment]);
		exit();
	}
}
?>