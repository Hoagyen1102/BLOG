<?php
class register_controller extends vendor_main_controller {
	public function index() {
        if(isset($_POST['btn-submit'])) {
			$user = $_POST['user'];
			$repass = $_POST['re-password'];
            if($user['password']==$repass) {
                $findUserById = user_model::getInstance()->getRecordWhere('email="'.$user['email'].'"');
                if(!isset($findUserById)) {
                    $adduser = user_model::getInstance();
                    if($adduser->addRecord($user))
                        header( "Location: ".vendor_app_util::url(array('ctl'=>'login')));
                }else{
                    echo "email da ton tai";
                }
            }
		}
        $this->display();
	}
}
?>