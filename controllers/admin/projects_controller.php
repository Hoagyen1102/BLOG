<?php
class projects_controller extends vendor_backend_controller {
	public function index() {
    $im = project_model::getInstance();
		$this->records = $im->allp('*',['order'=>'id ASC']);
		$this->display();
  }
  
	public function view($id) {
    $um = project_model::getInstance();
		$this->record = $um->getRecord($id);
		$this->display();
	} 

	public function add() {
		if(isset($_POST['btn_submit'])) {
      $um = project_model::getInstance();
			$projectData = $_POST['project'];
			if($_FILES['image']['tmp_name'])
				$projectData['image'] = $this->uploadImg($_FILES);
			$valid = $um->validator($projectData);
			if($valid['status']) {
				if($um->addRecord($projectData))
					header("Location: ".vendor_app_util::url(["ctl"=>"projects"]));
				else {
					$this->errors = ['database'=>'An error occurred when inserting data!'];
					$this->record = $projectData;
				}
			} else {
				$this->errors = $um::convertErrorMessage($valid['message']);
				$this->record = $projectData;
			}
		}
		$this->display();
	} 

	public function edit($id) {
    $im = project_model::getInstance();
		$this->record = $im->getRecord($id);
		$this->id = $id;
		if(isset($_POST['title']) && isset($_POST['title_slug']) && isset($_POST['content'])) {

			$projectData = [
				'title' => $_POST['title'],
				'title_slug' => $_POST['title_slug'],
				'content' => $_POST['content']
			];

			$valid = $im->validator($projectData, $id);
			if($valid['status']){
				if($im->editRecord($id, $projectData)) {
					$data = [
						'status' => true,
						'data' => 'Edit successfully !'
					];
					http_response_code(200);
					exit(json_encode($data));
				} else {
					$data = [
						'status' => false,
						'data' => 'Edit unsuccessfully  '
					];
					http_response_code(500);
					exit(json_encode($data));
				}
			} else {
				$this->errors = $im::convertErrorMessage($valid['message']);
				$data = [
					'status' => false,
					'data' => $this->errors
				];
				http_response_code(500);
				exit(json_encode($data));
			}
		}
		$this->display();
	} 

	public function del($id) {
		$im = new project_model();
		if($im->delRecord($id)) {
			header( "Location: ".vendor_app_util::url(array('ctl'=>'projects')));
		} else {
			$this->errors = ['message'=>'Can not delete data!'];
		}
	}
	
	public function delmany() {
		global $app;
		$ids = $app['prs']['ids'];
        $im = project_model::getInstance();
		if($im->delRelativeRecords($ids)) echo "Delete many successful";
		else echo "error";
	}
}
?>