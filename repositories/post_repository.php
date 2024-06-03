<?php
class post_repository {
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
	public static function checkPermission($slug){
		$post = self::getRecordBySlug($slug);
        if($post['user_id'] == $_SESSION['user']['id']){
			return true;
		}
		return false;
    }  
	public static function getTopRecord() {
        $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $sql = 'SELECT posts.*, users.id as users_id, users.email as users_email, users.password as users_password, 
				users.fullname as users_fullname, users.username as users_username, users.image as users_image, users.role as users_role,
				users.status as users_status, users.created as users_created, users.updated as users_updated, categories.id as categories_id, 
				categories.category_name as categories_category_name FROM posts 
				LEFT JOIN users ON posts.user_id=users.id 
				LEFT JOIN categories ON posts.category_id=categories.id 
				WHERE posts.status = 1
				ORDER BY posts.created DESC LIMIT 8';
        $result = mysqli_query($conn, $sql);
        return $result;
    } 
}
?>