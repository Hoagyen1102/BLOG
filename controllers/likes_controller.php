<?php
class likes_controller extends vendor_main_controller {
	public function index() {
	} 

	public function add($array) {
		try {
			$this->checkAuth();
	
			$postBefore = post_repository::getRecordByID($array['id']);
			$commentBefore = comment_repository::getRecordByID($array['id']);

			$hasLike = like_repository::checkLike($array['id'],$array['object_type_id']);

			if($array['object_type_id'] == 1){
				$edittotallike = post_model::getInstance();
				$object = like_repository::upLikes($hasLike, $postBefore, $array, $edittotallike);
			}else{
				$edittotallike = comment_model::getInstance();
				$object = like_repository::upLikes($hasLike, $commentBefore, $array, $edittotallike);
			}
	
			echo json_encode(['success' => true, 'total_like' => $object['total_like'], 'obj_type' => $array['object_type_id'], 'has_liked' => $hasLike]);
			exit();
		} catch (Exception $e) {
			echo 'Có lỗi xảy ra: ' . $e->getMessage();
		}
	}
}
?>