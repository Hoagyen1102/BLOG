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
  <img src="https://accounts.viblo.asia/assets/webpack/logo.fbfe575.svg" alt="Viblo">
	<div class="form w-700">
    <h2>Quên mật khẩu</h2>
    <p class="mb-10">Bạn quên mật khẩu của mình? Đừng lo lắng! Hãy cung cấp cho chúng tôi email bạn sử dụng để đăng ký tài khoản Viblo. Chúng tôi sẽ gửi cho bạn một liên kết để đặt lại mật khẩu của bạn qua email đó.</p>
    <p class="mb-10"><span style="color:red">*</span>&nbsp;Địa chỉ email của bạn</p>
    
		<form method="post" action="<?php echo vendor_app_util::url(array('ctl'=>'login','act'=>'forgotPassWord')); ?>">
			<div class="form-text">
				<input type="email" id="email" name="user[email]" class="input-text w-100">
			</div>
      <div class="d-flex e-flex">
  			<input type="submit" class="btn-submit btn-forgot" name="btn-submit" value="Gửi email cho tôi">
      </div>
		</form>
	</div>
</div>
</body>
</html>