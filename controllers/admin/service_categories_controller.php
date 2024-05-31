<?php
class service_categories_controller extends vendor_crud_controller {
	public function index() {
		$um = new service_category_model();
		$this->service_categories = $um->allp();
		$this->display();
	}

	public function view($id) {
		$um = new service_category_model();
		$this->service_category = $um->getRecord($id);
		$this->display();
	}

	public function add() {
		if(isset($_POST['btn_submit'])) {
			$um = new service_category_model();
			$service_categoryData = $_POST['service_category'];
			if($_FILES['image']['tmp_name'])
				$service_categoryData['image'] = $this->uploadImg($_FILES);
			$valid = $um->validator($service_categoryData);
			if($valid['status']) {
				if($um->addRecord($service_categoryData))
					header("Location: ".vendor_app_util::url(["ctl"=>"service_categories"]));
				else {
					$this->errors = ['database'=>'An error occurred when inserting data!'];
					$this->service_category = $service_categoryData;
				}
			} else {
				$this->errors = $um::convertErrorMessage($valid['message']);
				$this->service_category = $service_categoryData;
			}
		}
		$this->display();
	}

	public function edit($id) {
		$um = new service_category_model();
		$this->service_category = $um->one($id);
		if(isset($_POST['btn_submit'])) {
			$service_categoryData = $_POST['service_category'];
			if($_FILES['image']['tmp_name']) {
				if($this->service_category['image'] && file_exists(RootURI."/media/upload/" .$this->controller.'/'.$this->service_category['image']))
					unlink(RootURI."/media/upload/" .$this->controller.'/'.$this->service_category['image']);
				$service_categoryData['image'] = $this->uploadImg($_FILES);
			}
			
			$valid = $um->validator($service_categoryData, $id);
			$service_categoryData['id'] = $id;
			if($valid['status']){
				if($um->editRecord($id, $service_categoryData)) {
					header("Location: ".vendor_app_util::url(["ctl"=>"service_categories"]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'];
					$this->service_category = $service_categoryData;
				}
			} else {
				$this->errors = $um::convertErrorMessage($valid['message']);
				$this->service_category = $service_categoryData;
			}
		}
		$this->display();
	}

	public function del($id) {
		$service_categories = new service_category_model();
		$rs = $service_categories->delRecord($id);
		if($rs) echo "Delete Successful";
		else echo "error";
	}

	public function delmany() {
		global $app;
		$ids = $app['prs']['ids'];
		$service_categories = new service_category_model();
		$rs = $service_categories->delRecords($ids);
		if($rs) echo "Delete Successful";
		else echo "error";
	}
}
?>
