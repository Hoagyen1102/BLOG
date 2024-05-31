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
	<div class="form w-550">
		<h2>Đăng ký tài khoản cho Viblo</h2>
    	<p class="mb-10">Chào mừng bạn đến <b>Nền tảng Viblo!</b> Tham gia cùng chúng tôi để tìm kiếm thông tin hữu ích cần thiết để cải thiện kỹ năng IT của bạn. Vui lòng điền thông tin của bạn vào biểu mẫu bên dưới để tiếp tục.</p>
		<form method="post" action="<?php echo vendor_app_util::url(['ctl'=>'register']); ?>">
			<div class="form-text">
				<input type="text" id="fullname" name="user[fullname]" placeholder="Tên của bạn" class="input-text" required>
			</div>
			<div class="d-flex">
				<div class="form-text">
					<input type="email" id="email" name="user[email]" placeholder="Địa chỉ email của bạn" class="input-text" required>
				</div>
				<div style="width:40px"></div>
				<div class="form-text">
					<input type="text" id="username" name="user[username]" placeholder="Tên tài khoản" class="input-text" required>
				</div>
			</div>
			<div class="form-text">
				<i class="fa-solid fa-lock"></i>
				<input type="password" name="user[password]" placeholder="Mật khẩu" class="input-text" required>
			</div>
			<div class="form-text">
				<i class="fa-solid fa-lock"></i>
				<input type="password" name="re-password" placeholder="Xác nhận mật khẩu của bạn" class="input-text" required>
			</div>
			<input type="checkbox" id="agree" name="agree" required>
			<label for="agree"> Tôi đồng ý <span style="color:var(--blue)">điều khoản dịch vụ Viblo</span></label><br><br>
			<input type="submit" class="btn-submit w-100" name="btn-submit" value="Đăng ký">
		</form>
	</div>
</div>
</body>