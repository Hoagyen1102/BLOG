<?php
class like_repository {
	public static function getRecordByID($id){
		$like = like_model::getInstance();
		$record = $like->getRecord($id, $fields='*', ['joins'=>['user', 'like', 'object_type']]);
		return $record;
    }  
	
	public static function getRecordByUserID(){
		$likes = like_model::getInstance();
		$record = $likes->getRecords('*', ['conditions' => 'user_id='.$_SESSION['user']['id']]);
		return $record;
    }  

	public static function checkLike($id,$object_id){
		$like = like_model::getInstance();
		if(isset($_SESSION['user'])){
			$records = $like->getRecords('*',['conditions' => 'user_id='.$_SESSION['user']['id'].' and object_id='.$id.' and object_type_id='.$object_id]);
			if($records->num_rows > 0){
				return true;
			}
		}
		return false;
    }  
	
	public static function upLikes($hasLike,$object,$array,$edittotallike){
		$addlike = like_model::getInstance();
		if (!$hasLike) {
			$like['user_id'] = $_SESSION['user']['id'];
			$like['object_id'] = $array['id'];
			$like['object_type_id'] = $array['object_type_id'];
			$object['total_like']++;
			
			$addlike->addRecord($like);
			$edittotallike->editRecord($array['id'],['total_like' => $object['total_like']]);
		}else{
			$addlike->delRecord(null, 'user_id=' . $_SESSION['user']['id'] . ' AND object_id=' . $array['id']);
			$object['total_like']--;
			$edittotallike->editRecord($array['id'],['total_like' => $object['total_like']]);
		}
		return $object;
    }  

	public static function listCmtLikeByUser(){
        if(isset($_SESSION['user'])){
            $like = like_model::getInstance();
            $records = $like->getRecords('object_id', ['conditions' => 'user_id='.$_SESSION['user']['id'].' and object_type_id=2']);
            $likedCommentIds = [];
            while ($row = mysqli_fetch_assoc($records)) {
                $likedCommentIds[] = $row['object_id'];
            }
            return $likedCommentIds;
        }
        return [];
    }  
}
?>