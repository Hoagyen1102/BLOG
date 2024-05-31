<?php
class vendors_controller extends vendor_api_controller {
	public function index() {
		$vm = vendor_model::getInstance();
		if ($_SERVER['REQUEST_METHOD']=='GET') {
		 	if($records = $vm->getRecords()){
				$data = [];
		 		foreach ($records as $key => $value) {
					$data['data'][$key] = $value; 
				}
		 		http_response_code(200);
				echo json_encode($data);
			}else{
				$message = 'Data not Found!';
				http_response_code(404);
				echo json_encode($message);
			}
		}else {
		 	echo "Method incorect!";
		}
	}

	public function view($id) {
		if ($_SERVER['REQUEST_METHOD']=='GET') {
			$vm = vendor_model::getInstance();
		 	if($record['data'] = $vm->getRecord($id)){
		 		http_response_code(200);
				echo json_encode($record);
			}else{
				$message = 'Data not Found!';
				http_response_code(404);
				echo json_encode($message);
			}
		}else {
		 	echo "Method incorect!";
		}
	}

	public function add() {
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			global $app;
			$vm = vendor_model::getInstance();
			$vendorData = $_POST;
			if(!$vendorData)
				$vendorData = json_decode(file_get_contents('php://input'),1);
			
			if($id=$vm->addRecord($vendorData)) {
				$vendorData['id'] = $id;
				
				http_response_code(200);
				echo json_encode($vendorData);
			} else {
				$data = [
					'status' => 0,
					'message' => 'Error when adding data!'
				]; 
				http_response_code(400);
				echo json_encode($data);
			}
		} else {
			http_response_code(404);
			echo "Error Method!";
		}
	}
	public function edit($id) {
		if ($_SERVER['REQUEST_METHOD']=='PUT') {
			$vendorData = json_decode(file_get_contents('php://input'),1);
			var_dump($vendorData);	exit;
			$vm = vendor_model::getInstance();
			if($newvendor=$vm->editRecord($id,$vendorData)) {
				http_response_code(200);
				echo json_encode($newvendor);
			} else {
				$data = [
					'status' => 0,
					'message' => 'Error when edit data!'
				]; 
				http_response_code(400);
				echo json_encode($vendorData);
			}
		} else {
			http_response_code(404);
			echo "Error Method!";
		}
	}

	public function del($id) {
		if ($_SERVER['REQUEST_METHOD']=='DELETE') {
			$vm = vendor_model::getInstance();
			if($vm->delRecord($id)) {
				$data = ['id' => $id[1]];
		 		http_response_code(200);
				echo json_encode($data);
			} else {
				$message = 'Can not delete this data!';
				http_response_code(404);
				echo json_encode($message);
			}
		}
	}
}
?>
