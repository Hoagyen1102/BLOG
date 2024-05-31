<?php
class post_repository {
	// private static $repo = null;
 
    // public static function getRepoPost() {
    //     if (!self::$repo) {
    //         self::$repo = new post_repository();
    //     }
   
    //     return self::$repo;
    // }

	public static function getAllRecordPublished(){
		$posts = post_model::getInstance();
		$records = $posts->getRecords('*', ['joins'=>['user', 'category', 'comment', 'like'], 'conditions' => 'status=1']);
		return $records;
    }

	public static function upViews($slug){
		$post = post_model::getInstance();
		$record = $post->getRecord(null, $fields='*', ['joins'=>['user', 'category', 'comment', 'like'], 'conditions' => 'slug = "'.$slug['slug'].'"']);
		if(isset($_SESSION['user']['id'])){
			if($record && ($record['user_id'] != $_SESSION['user']['id'])) {
				$post->editRecord($record['id'],['views' => ++$record['views']]);
			}
		}
		return $record;
    }    
     
	public static function getCount($record,$type){
		$array = [];
		if($record) {
			$array[$record['id']] = $type->getCountRecords(['conditions' => 'post_id='.$record['id']]);
		}
		return $array;
    }    
	
	public static function getCounts($records,$type){
		$array = [];
		if($records) {
			mysqli_data_seek($records, 0);
			while($row = mysqli_fetch_array($records)){
				$array[$row['id']] = $type->getCountRecords(['conditions' => 'post_id='.$row['id']]);
			}
		}
		return $array;
    }    
	
	public static function getRecordByID($id){
		$post = post_model::getInstance();
		$record = $post->getRecord($id, $fields='*', ['joins'=>['user', 'category', 'comment', 'like']]);
		return $record;
    }  
	
	public static function getRecordBySlug($slug){
		$post = post_model::getInstance();
		$record = $post->getRecord(null, $fields='*', ['joins'=>['user', 'category', 'comment', 'like'], 'conditions' => 'slug = "'.$slug['slug'].'"']);
		return $record;
    }  

	public static function getRecordByUserID(){
		$posts = post_model::getInstance();
		$record = $posts->getRecords('*', ['joins'=>['user', 'category', 'comment', 'like'],'conditions' => 'user_id='.$_SESSION['user']['id']]);
		return $record;
    }  
}
?>