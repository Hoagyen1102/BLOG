<?php
class books_controller extends vendor_backend_controller {
	public function index() {
		global $app;
		$conditions = "";
		if(isset($app['prs']['status'])) {
			$conditions .= "status=".$app['prs']['status'];
		}

		if(isset($app['prs']['kw'])) {
			$conditions .= (($conditions)? " AND (":"")."title LIKE '%".$app['prs']['kw']."%' 
				OR author LIKE '%".$app['prs']['kw']."%' 
				OR description LIKE '%".$app['prs']['kw']."%' 
				OR content LIKE '%".$app['prs']['kw']."%'".(($conditions)? ")":"");
		}
		
    $m = book_model::getInstance();
		$this->records = $m->allp('*',['conditions'=>$conditions, 'joins'=>['user']]);
		$this->display();
	}

	public function view($id) {
    $m = book_model::getInstance();
		$this->record = $m->getRecord($id, '*', ['joins'=>['user']]);
		$this->display();
	}

	public function add() {
		if(isset($_POST['btn_submit'])) {
      $m = book_model::getInstance();
			$data = $_POST['book'];
			if($_FILES['image']['tmp_name'])
				$data['image'] = $this->uploadImg($_FILES);
			$data['user_id'] = (int)$_SESSION['user']['id'];
			$valid = $m->validator($data);
			if($valid['status']) {
				if($m->addRecord($data))
					header("Location: ".vendor_app_util::url(["ctl"=>"books"]));
				else {
					$this->errors = ['database'=>'An error occurred when inserting data!'];
				}
			} else {
				$this->errors = $m::convertErrorMessage($valid['message']);
			}
			$this->record = $data;
		}
		$this->display();
	}

	public function edit($id) {
    $m = book_model::getInstance();
		$this->record = $m->one($id, '*', ['joins'=>['user']]);
		if(isset($_POST['btn_submit'])) {
			$data = $_POST['book'];
			if($_FILES['image']['tmp_name']) {
				if($this->record['image'] && file_exists(RootURI."/media/upload/" .$this->controller.'/'.$this->record['image']))
					unlink(RootURI."/media/upload/" .$this->controller.'/'.$this->record['image']);
				$data['image'] = $this->uploadImg($_FILES);
			}
			
			$valid = $m->validator($data, $id);
			if($valid['status']){
				if($m->editRecord($id, $data)) {
					header("Location: ".vendor_app_util::url(["ctl"=>"books"]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'];
				}
			} else {
				$this->errors = $m::convertErrorMessage($valid['message']);
				$data['id'] = $id;
			}
			$this->record = $data;
		}
		$this->display();
	}

	public function trash() {
		global $app;
		$id = $app['prs'][1];
    $m = book_model::getInstance();
		$data['status'] = 0;
		$status=explode("/",$_GET["pr"])[4]==0?1:0;

		if($m->editRecords($id, ["status" => $status])) echo "Successful handle!";
		else echo "error";
	}

	public function del($id) {
        $m = book_model::getInstance();
		if($m->delRelativeRecord($id)) echo "Delete Successful";
		else echo "error";
	}

	public function trashmany() {
		global $app;
		$ids = $app['prs']['ids'];
        $m = book_model::getInstance();
		$data['status'] = 0;
		if($m->editRecords($ids, $data, "role != 1")) echo "Move many to trash successful";
		else echo "error";
	}

	public function delmany() {
		global $app;
		$ids = $app['prs']['ids'];
        $m = book_model::getInstance();
		if($m->delRelativeRecords($ids)) echo "Delete many successful";
		else echo "error";
	}

	public function profile() {
		$m = new book_model();
		$this->record = $m->getRecord($_SESSION['book']['id']);
		$this->display();
	}

	public function changepassword() {
		global $app;
		$curpassword = vendor_app_util::generatePassword($_POST['curpassword']);
        $m = book_model::getInstance();
		if( $m->checkOldPassword($curpassword)) {
			$newpassword 	= $_POST['newpassword'];
			$data['password'] = vendor_app_util::generatePassword($newpassword);

			$id 		= $_SESSION['book']['id'];
			$password 	= $m->getRecords($id);
			if($m->editRecord($id, $data)) 
				echo json_encode(['status'=>1, 'message'=>'Update successful!']);
			else echo json_encode(['status'=>0, 'message'=>'Have error when update password!']);
		} else {
			echo json_encode(['status'=>0, 'message'=>'Current password not match!']);
		}
		exit;
	}

	public function search_books(){
    $m = book_model::getInstance();
		$conditions  = "";
		$search_term = isset($_GET['q']) ? $_GET['q'] : '';
		$conditions .= " role in (1,2,3,4,5)";
		$conditions .= " and (CONCAT(TRIM(books.firstname),\" \",TRIM(books.lastname)) like '%".$search_term."%'";
		$conditions .= " or CONCAT(TRIM(books.lastname),\" \",TRIM(books.firstname)) like '%".$search_term."%'";
		$conditions .= " or TRIM(books.firstname) like '%".$search_term."%'";
		$conditions .= " or books.email like '%".$search_term."%') ";

		$options['conditions'] = $conditions;
		$options = [
			'conditions' => $conditions,
			'order' => 'firstname ASC',
		];
		$result = $m->allp('*',$options);
		$data['incomplete_results'] = false ;
		$data['items'] = $result['data'];
		$data['page'] = $result['curp'];
		$data['total_count'] = $result['norecords'];
		echo json_encode($data);
	}
}
?>