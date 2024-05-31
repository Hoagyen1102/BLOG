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
	
		// vote
		// $this->checkAuth();
		// $repo_post = post_repository::getRepoPost();
		
		// $addlike = like_model::getInstance();
		// $edittotallike = post_model::getInstance();

		// $post = post_repository::getRecordByID($array['id']);

		// $like['user_id'] = $_SESSION['user']['id'];
		// $like['post_id'] = $array['id'];
		// $like['object_type_id'] = $array['object_id'];
		
		// if($array['like'] == 'like'){
		// 	$like['value'] =  1;
		// 	$post['total_like']++;
		// }else{
		// 	$like['value'] =  -1;
		// 	$post['total_like']--;
		// }

		// $addlike->addRecord($like);
		// $edittotallike->editRecord($array['id'],['total_like' => $post['total_like']]);

		// header( "Location: ".vendor_app_util::url(
		// 	array('ctl'=>'posts', 
		// 		'act'=>'view', 
		// 		'params'=>array(
		// 			'id'=>$array['id']
		// 	)))); 
}
?>