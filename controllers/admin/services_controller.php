<?php
class services_controller extends vendor_crud_controller {
	public function index() {
		$um = new service_model();
		$this->services = $um->allp();
		$this->display();
	}

	public function incategory() {
		global $app;
		$category_id = $app['prs']['category_id'];
		$um = new service_model();
		$this->services = $um->allp("*", ["conditions"=>"category_id=".$category_id]);
		$this->display(['act'=>'index']);
	}
	
	public function view($id) {
		$um = new service_model();
		$this->service = $um->getRecord($id);
		$sc = new service_category_model();
		$this->categories = vendor_crud_model::convertToList($sc->getRecords('id,name', ['condition'=>'status=1']), 'name');
		$this->display();
	}

	public function add() {
		if(isset($_POST['btn_submit'])) {
			$um = new service_model();
			$serviceData = $_POST['service'];
			if($_FILES['image']['tmp_name'])
				$serviceData['image'] = $this->uploadImg($_FILES);
			$valid = $um->validator($serviceData);
			if($valid['status']) {
				if($um->addRecord($serviceData))
					header("Location: ".vendor_app_util::url(["ctl"=>"services"]));
				else {
					$this->errors = ['database'=>'An error occurred when inserting data!'];
					$this->service = $serviceData;
				}
			} else {
				$this->errors = $um::convertErrorMessage($valid['message']);
				$this->service = $serviceData;
			}
		}
		$sc = new service_category_model();
		$this->categories = vendor_crud_model::convertToList($sc->getRecords('id,name', ['condition'=>'status=1']), 'name');
		$this->display();
	}

	public function edit($id) {
		$um = new service_model();
		$this->service = $um->one($id);
		if(isset($_POST['btn_submit'])) {
			$serviceData = $_POST['service'];
			if($_FILES['image']['tmp_name']) {
				if($this->service['image'] && file_exists(RootURI."/media/upload/" .$this->controller.'/'.$this->service['image']))
					unlink(RootURI."/media/upload/" .$this->controller.'/'.$this->service['image']);
				$serviceData['image'] = $this->uploadImg($_FILES);
			}
			
			$valid = $um->validator($serviceData, $id);
			$serviceData['id'] = $id;
			if($valid['status']){
				if($um->editRecord($id, $serviceData)) {
					header("Location: ".vendor_app_util::url(["ctl"=>"services"]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'];
					$this->service = $serviceData;
				}
			} else {
				$this->errors = $um::convertErrorMessage($valid['message']);
				$this->service = $serviceData;
			}
		}
		$sc = new service_category_model();
		$this->categories = vendor_crud_model::convertToList($sc->getRecords('id,name', ['condition'=>'status=1']), 'name');
		$this->display();
	}

	public function del($id) {
		$services = new service_model();
		$rs = $services->delRecord($id);
		if($rs) echo "Delete Successful";
		else echo "error";
	}

	public function delmany() {
		global $app;
		$ids = $app['prs']['ids'];
		$services = new service_model();
		$rs = $services->delRecords($ids);
		if($rs) echo "Delete Successful";
		else echo "error";
	}
}
?>
