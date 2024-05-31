<?php
class comment_repository {
    public static function getRecordByID($id){
        if($id){
            $comment = comment_model::getInstance();
            $record = $comment->getRecord($id, $fields='*', ['joins'=>['user', 'post']]);
        }else{
            $record = null;
        }
		return $record;
    } 
	public static function getRecordByPostId($id){ 
		$comment = comment_model::getInstance();
		$comments = $comment->getRecords('*', ['joins'=>['user', 'post'],'conditions'=>'post_id='.$id['id'],'order'=>'path']);
		return $comments;
    }   
    public static function getLastRecord() {
        $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $sql = 'SELECT comments.*, users.email as users_email, users.fullname as users_fullname, users.username as users_username, users.image as users_image
                FROM comments LEFT JOIN users ON comments.user_id=users.id 
                ORDER BY comments.id DESC LIMIT 1';
        $result = mysqli_query($conn, $sql);
        $cmt = mysqli_fetch_object($result);
        return $cmt;
    }    
    public static function pathTree($path){
        $path = sprintf('%04d', $path);
		return $path;
    }    
    public static function addComment($array){
        //thêm trước để lấy id
        $comment = $_POST['comment'];
		$comment['user_id'] = $_SESSION['user']['id'];
		$comment['post_id'] = $array['id'];
        $addComment = comment_model::getInstance();
		$addComment->addRecord($comment);
        //lấy id
        $getId = self::getLastRecord();
		$commentParent = comment_repository::getRecordByID($array['path']);
		if(empty($commentParent)){
			$comment['path'] = comment_repository::pathTree($getId->id);
		}else{
			$comment['path'] = $commentParent['path'].'.'.comment_repository::pathTree($getId->id);
		}
        $addComment->editRecord($getId->id,['path' => $comment['path']]);

		$user = comment_model::getInstance();
        return $comment;
    }
    public static function deleteComment($id){
		$comment = comment_model::getInstance();
		$record = $comment->getRecord($id, $fields='*', ['joins'=>['user', 'category', 'comment', 'like']]);
        if($record) {
            $comment->editRecord($record['id'],['content' => 'Bình luận đã bị xóa!','status' => "1"]);
        }
		return $record;
    }
    public static function editComment($id){
        $comment = comment_model::getInstance();
        $editComment = $_POST['comment'];
		$record = $comment->getRecord($id, $fields='*', ['joins'=>['user', 'category', 'comment', 'like']]);
        if($record) {
            $comment->editRecord($record['id'],['content' => $editComment['content']]);
        }
		return $record;
    }
}
?>