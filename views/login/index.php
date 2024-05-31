<!DOCTYPE html>
<html>
<head>
    <title>INFOR</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="<?php echo RootREL; ?>media/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="icon" href="https://viblo.asia/apple-touch-icon-57x57.png"/>
</head>
<body>
<div class="form-wrapper d-flex c-flex justify-center">
	<div class="form w-400">
		<img src="https://accounts.viblo.asia/assets/webpack/logo.fbfe575.svg" alt="Viblo">
		<form method="post" action="<?php echo vendor_app_util::url(array('ctl'=>'login')); ?>">
			<div class="form-text">
				<i class="fa-solid fa-user"></i>
				<input type="email" id="email" name="user[email]" placeholder="Tên đăng nhập hoặc email" class="input-text-login">
			</div>
			<div class="form-text">
				<i class="fa-solid fa-lock"></i>
				<input type="password" name="user[password]" placeholder="Mật khẩu" class="input-text-login">
			</div>
			<input type="submit" class="btn-submit w-100" name="btn-submit" value="Đăng nhập">
		</form>
		<div class="d-flex space-between">
			<a href="<?php echo vendor_app_util::url(array('ctl'=>'login','act'=> 'forgotPassWord' )); ?>" class="text-blue">Quên mật khẩu?</a>
			<a href="<?php echo vendor_app_util::url(['ctl'=>'register']); ?>" class="text-blue">Tạo tài khoản</a>
		</div>
	</div>
</div>
</body>
</html>