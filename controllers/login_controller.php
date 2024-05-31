<?php
class login_controller extends vendor_main_controller {
	public function index() {
        if(isset($_POST['btn-submit'])) {
			$user = $_POST['user'];
			$auth = new vendor_auth_model();
			$rs= $auth->login($user);
			if($rs==1){
				header( "Location: ".vendor_app_util::url(array('ctl'=>'')));

			}else{
				header( "Location: ".vendor_app_util::url(array('ctl'=>'login')));
			}
		}
		$this->display();
	}
	public function logout(){
		unset($_SESSION['user']);
		header( "Location: ".vendor_app_util::url(array('ctl'=>'')));
	}
	public function forgotPassWord() {
        if(isset($_POST['btn-submit'])) {
			$user = $_POST['user'];
		}
		$this->display();
	} 
}
?>