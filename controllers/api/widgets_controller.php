<?php
class widgets_controller extends vendor_api_controller {
	public function index() {
		$vm = widget_model::getInstance();
		if ($_SERVER['REQUEST_METHOD']=='GET') {
		 	if($records = $vm->getAllRecords()){
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

	public function clients($user_id) {
		$vm = widget_model::getInstance();
		if ($_SERVER['REQUEST_METHOD']=='GET') {
		 	if($records = $vm->getRecords("*", ["conditions"=>"user_id = $user_id[1]"])){
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
			$vm = widget_model::getInstance();
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

	public function add($user_id) {
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			global $app;
			$vm = widget_model::getInstance();
			$widgetData = $_POST;
			if(!$widgetData)
				$widgetData = json_decode(file_get_contents('php://input'),1);
			$widgetData["user_id"] = $user_id[1];
			
			if($id=$vm->addRecord($widgetData)) {
				$widgetData['id'] = $id;
				
				http_response_code(200);
				echo json_encode($widgetData);
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
			$widgetData = json_decode(file_get_contents('php://input'),1);
			var_dump($widgetData);	exit;
			$vm = widget_model::getInstance();
			if($newwidget=$vm->editRecord($id,$widgetData)) {
				http_response_code(200);
				echo json_encode($newwidget);
			} else {
				$data = [
					'status' => 0,
					'message' => 'Error when edit data!'
				]; 
				http_response_code(400);
				echo json_encode($widgetData);
			}
		} else {
			http_response_code(404);
			echo "Error Method!";
		}
	}

	public function del($id) {
		if ($_SERVER['REQUEST_METHOD']=='DELETE') {
			$vm = widget_model::getInstance();
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
