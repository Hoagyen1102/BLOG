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
<header>
    <div class="top-header w-100">
        <div class="container">
            <div class="d-flex align-center">
                <div class="logo">
                    <img src="https://viblo.asia/logo_full.svg" alt="Viblo" width="62" height="21">
                </div>
                <div class="center-header">
                    <ul class="list-menu-header">
                        <li><a href="<?php echo vendor_app_util::url(array('ctl'=>'home')); ?>" class="active">Bài viết</a></li>
                        <li><a href="#">Hỏi đáp</a></li>
                        <li><a href="#">Thảo luận</a></li>
                    </ul>
                </div>
                <div class="search flex-grow mr-16">
                    <form id="form-search" action="/search" method="post">
                        <input type="text" class="search-text" placeholder="Tìm kiếm trên Viblo">
                        <button class="btn-search"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="right-header d-flex">
                    <a href="#"><i class="fa fa-info mr-16"></i></a>
                    <a class="i-flex align-center" href="#" style="margin-left:13px; margin-right:5px">
                        <img src="https://viblo.asia/images/vi-flag-32x48.png" width="20" height="20" alt="flag">&nbsp;VI</a>
                    <a href="<?php echo vendor_app_util::url(array('ctl'=>'posts')); ?>"><i class="fa-solid fa-bars" style="margin-left:13px; margin-right:13px"></i></a>
                    <a href="#" class="sign-in i-flex align-center">
                    <?php
                    if(isset($_SESSION['user'])){
                    ?>
                    <a href="#" class="profile-link"><img src="media/upload/users/<?php echo $_SESSION['user']['image']?>" alt="<?php echo $_SESSION['user']['fullname']; ?>"></a>
                    <ul class="list-profile">
                        <div class="info d-flex align-center">
                            <img src="media/upload/users/<?php echo $_SESSION['user']['image']?>" alt="<?php echo $_SESSION['user']['fullname']; ?>">
                            <li><a href="#" class="text-blue"><span>&nbsp;<?php echo $_SESSION['user']['fullname']?></span></a></li>
                        </div>
                        <li><a href="<?php echo vendor_app_util::url(array('ctl'=>'login', 'act'=>'logout')); ?>" class="sign-in">
                            <i class="fa fa-sign-in size-14"></i><span>&ensp;Đăng xuất</span>
                        </a></li>
                    </div>
                    <?php
                    }else{
                    ?>
                    <a href="<?php echo vendor_app_util::url(['ctl'=>'login']); ?>" class="sign-in">
                        <i class="fa fa-sign-in size-14"></i><span>&nbsp;Đăng nhập/Đăng ký</span>
                    </a>                    
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-header">

    </div>
</header>