<?php
global $mediaFiles;
?>
<!-- Start header -->
<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<!-- End header -->
<!-- Start main -->
<div class="main">
    <div class="container">
        <div class="all-content d-flex">
            <div class="content w-75" >
                <div class="d-flex space-between">
                    <div class="user d-flex">
                        <a href="#"><img src="<?php echo '../../media/upload/users/'.$this->record['users_image']; ?>" alt="<?php echo $this->record['users_fullname']; ?>" width="50px"></a>
                        <div class="user-infor mr-16">
                            <h4 class="fullname text-blue"><?php echo $this->record['users_fullname']; ?></h4>
                            <p class="username text-light-gray">@<?php echo $this->record['users_username']; ?></p>
                            <div class="item d-flex">
                                <span><i class="fa-solid fa-star"></i>825</span>
                                <span><i class="fa-solid fa-user-plus"></i>2</span>
                                <span><i class="fa-solid fa-pencil"></i>42</span>
                            </div>
                        </div>
                        <button class="btn-follow-content">Theo dõi</button>
                    </div>
                    <div class="interact">
                        <p class="time text-light-gray">Đã đăng vào lúc <?php echo date('d - m - 20y', strtotime($this->record['created'])); ?></p>
                        <div class="item d-flex e-flex">
                            <span><i class="fa-regular fa-eye"></i><?php echo $this->record['views']; ?></span>
                            <span><i class="fa-solid fa-comments"></i><?php echo $this->cmt[$this->record['id']]; ?></span>
                            <span><i class="fa-solid fa-bookmark"></i><?php echo $this->mark[$this->record['id']]; ?></span>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <h1 class="title-content"><?php echo $this->record['title'];?></h1>
                    <div class="detail-content">
                        <?php echo $this->record['content'];?>
                    </div>
                </div>
                <div class="like-btn">
                    <?php if($this->hasLike){ ?>
                        <a class="btn-like text-light-gray liked" href="<?php echo vendor_app_util::url(
                                        array('ctl'=>'likes', 
                                            'act'=>'add', 
                                            'params'=>array(
                                                'id'=>$this->record['id'],
                                                'object_type_id'=> 1,
                                        ))); ?>"><i class="fa-solid fa-thumbs-up"></i></a>
                    <?php }else{ ?>
                        <a class="btn-like text-light-gray" href="<?php echo vendor_app_util::url(
                                        array('ctl'=>'likes', 
                                            'act'=>'add', 
                                            'params'=>array(
                                                'id'=>$this->record['id'],
                                                'object_type_id'=> 1,
                                        ))); ?>"><i class="fa-solid fa-thumbs-up"></i></a>
                    <?php } ?>
                    <span class="number-like"><?php echo $this->record['total_like']; ?></span>
                </div>
            </div>  
            <div class="top-list w-25">
                <div class="newest-question">
                    <div class="d-flex w-100">
                        <h2><a href="#" class="text-blue">CÂU HỎI MỚI NHẤT</a></h2>
                        <hr>
                    </div>
                    <div class="each-sidebar">
                        <div class="title-sidebar">
                            <h2><a href="#">Đây là tiêu đề</a></h2>
                        </div>
                        <div class="item d-flex">
                            <span><i class="fa-solid fa-sort"></i>5</span>
                            <span><i class="fa-solid fa-reply"></i>2</span>
                            <span><i class="fa-regular fa-eye"></i>12</span>
                            <span><i class="fa-solid fa-comments"></i>1</span>
                        </div>
                        <div class="text-mute-sidebar">
                            <a href="#">Tên tác giả</a>
                        </div>
                    </div>
                    <div class="each-sidebar">
                        <div class="title-sidebar">
                            <h2><a href="#">Đây là tiêu đề</a></h2>
                        </div>
                        <div class="item d-flex">
                            <span><i class="fa-solid fa-sort"></i>5</span>
                            <span><i class="fa-solid fa-reply"></i>2</span>
                            <span><i class="fa-regular fa-eye"></i>12</span>
                            <span><i class="fa-solid fa-comments"></i>1</span>
                        </div>
                        <div class="text-mute-sidebar">
                            <a href="#">Tên tác giả</a>
                        </div>
                    </div>
                    <div class="each-sidebar">
                        <div class="title-sidebar">
                            <h2><a href="#">Đây là tiêu đề</a></h2>
                        </div>
                        <div class="item d-flex">
                            <span><i class="fa-solid fa-sort"></i>5</span>
                            <span><i class="fa-solid fa-reply"></i>2</span>
                            <span><i class="fa-regular fa-eye"></i>12</span>
                            <span><i class="fa-solid fa-comments"></i>1</span>
                        </div>
                        <div class="text-mute-sidebar auth">
                            <a href="#">Tên tác giả</a>
                        </div>
                    </div>
                </div>
                <div class="slide-list">
                    <div class="slide-inner show">
                        <div class="d-flex w-100">
                            <h2><a href="#" class="text-blue">THỬ THÁCH ĐỀ XUẤT</a></h2>
                            <hr>
                            <h2><a href="#"><i class="fa-solid fa-code text-blue"></i></a></h2>
                        </div>
                        <div class="challenge border-none each-sidebar d-flex">
                            <div class="flex-grow">
                                <div class="title-sidebar">
                                    <h2><a href="#">Đây là tiêu đề</a></h2>
                                </div>
                                <div class="text-mute-sidebar">
                                    <a href="#">Ngày tháng năm</a>
                                </div>
                                <div class="hastag">
                                    <a href="#">Matrix</a>
                                </div>
                                <div class="item d-flex">
                                    <span><i class="fa-regular fa-star"></i>102</span>
                                    <span><i class="fa-regular fa-circle-check"></i>5</span>
                                    <span><i class="fa-solid fa-crown"></i>1</span>
                                </div>
                            </div>
                            <a href="#" class="challenge-rank-E rank">E</a>
                        </div>
                        <div class="challenge border-none each-sidebar d-flex">
                            <div class="flex-grow">
                                <div class="title-sidebar">
                                    <h2><a href="#">Đây là tiêu đề</a></h2>
                                </div>
                                <div class="text-mute-sidebar">
                                    <a href="#">Ngày tháng năm</a>
                                </div>
                                <div class="hastag">
                                    <a href="#">Matrix</a>
                                </div>
                                <div class="item d-flex">
                                    <span><i class="fa-regular fa-star"></i>102</span>
                                    <span><i class="fa-regular fa-circle-check"></i>5</span>
                                    <span><i class="fa-solid fa-crown"></i>1</span>
                                </div>
                            </div>
                            <a href="#" class="challenge-rank-A rank">A</a>
                        </div>
                        <div class="challenge border-none each-sidebar d-flex">
                            <div class="flex-grow">
                                <div class="title-sidebar">
                                    <h2><a href="#">Đây là tiêu đề</a></h2>
                                </div>
                                <div class="text-mute-sidebar">
                                    <a href="#">Ngày tháng năm</a>
                                </div>
                                <div class="hastag">
                                    <a href="#">Matrix</a>
                                </div>
                                <div class="item d-flex">
                                    <span><i class="fa-regular fa-star"></i>102</span>
                                    <span><i class="fa-regular fa-circle-check"></i>5</span>
                                    <span><i class="fa-solid fa-crown"></i>1</span>
                                </div>
                            </div>
                            <a href="#" class="challenge-rank-B rank">B</a>
                        </div>
                    </div>
                    <div class="slide-inner">
                        <div class="d-flex w-100">
                            <h2><a href="#" class="text-blue">CÂU ĐỐ ĐỀ XUẤT</a></h2>
                            <hr>
                        </div>
                    </div>
                    <div class="slide-inner">
                        <div class="d-flex w-100">
                            <h2><a href="#" class="text-blue">KHÓA HỌC ĐỀ XUẤT</a></h2>
                            <hr>
                        </div>
                    </div>
                    <div class="btn-bottom">
                        <button class="slide-bottom-btn active"></button>
                        <button class="slide-bottom-btn"></button>
                        <button class="slide-bottom-btn"></button>
                    </div>
                </div>
                <div class="top-auth">
                    <div class="d-flex w-100">
                        <h2><a href="#" class="text-blue">CÁC TÁC GIẢ HÀNG ĐẦU</a></h2>
                        <hr>
                    </div>
                    <div class="each-sidebar border-none">
                        <div class="d-flex align-center">
                        <a href="#"><img src="https://images.viblo.asia/avatar/d3fbbb69-55f2-4530-99de-de866b71e9d8.png" alt="Viblo" width="50px"></a>
                            <div>
                                <div class="title-sidebar">
                                    <h2 class="text-blue"><a href="#">Tên tác giả</a></h2>
                                    <a href="#">@tên tác giả</a>
                                </div>
                                <div class="follow">
                                    <button class="btn-follow"><i class="fa-solid fa-plus"></i>&nbsp;Theo dõi</button>
                                </div>
                            </div>
                        </div>
                        <div class="item d-flex">
                            <span><i class="fa-solid fa-star"></i>825</span>
                            <span><i class="fa-solid fa-pencil"></i>42</span>
                            <span><i class="fa-solid fa-user-plus"></i>2</span>
                            <span><i class="fa-regular fa-eye"></i>8471</span>
                        </div>
                    </div>
                    <div class="each-sidebar border-none">
                        <div class="d-flex align-center">
                        <a href="#"><img src="https://images.viblo.asia/avatar/d3fbbb69-55f2-4530-99de-de866b71e9d8.png" alt="Viblo" width="50px"></a>
                            <div>
                                <div class="title-sidebar">
                                    <h2 class="text-blue"><a href="#">Tên tác giả</a></h2>
                                    <a href="#">@tên tác giả</a>
                                </div>
                                <div class="follow">
                                    <button class="btn-follow"><i class="fa-solid fa-plus"></i>&nbsp;Theo dõi</button>
                                </div>
                            </div>
                        </div>
                        <div class="item d-flex">
                            <span><i class="fa-solid fa-star"></i>825</span>
                            <span><i class="fa-solid fa-pencil"></i>42</span>
                            <span><i class="fa-solid fa-user-plus"></i>2</span>
                            <span><i class="fa-regular fa-eye"></i>8471</span>
                        </div>
                    </div>
                    <div class="each-sidebar border-none">
                        <div class="d-flex align-center">
                        <a href="#"><img src="https://images.viblo.asia/avatar/d3fbbb69-55f2-4530-99de-de866b71e9d8.png" alt="Viblo" width="50px"></a>
                            <div>
                                <div class="title-sidebar">
                                    <h2 class="text-blue"><a href="#">Tên tác giả</a></h2>
                                    <a href="#">@tên tác giả</a>
                                </div>
                                <div class="follow">
                                    <button class="btn-follow"><i class="fa-solid fa-plus"></i>&nbsp;Theo dõi</button>
                                </div>
                            </div>
                        </div>
                        <div class="item d-flex">
                            <span><i class="fa-solid fa-star"></i>825</span>
                            <span><i class="fa-solid fa-pencil"></i>42</span>
                            <span><i class="fa-solid fa-user-plus"></i>2</span>
                            <span><i class="fa-regular fa-eye"></i>8471</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start comment -->
        <div class="comment mb-10">
            <h3 class="mb-10">Bình luận</h3>
            <?php if(isset($_SESSION['user'])){ ?>
            <form method="post" action="<?php echo vendor_app_util::url(
                                                    array('ctl'=>'comments', 
                                                        'act'=>'add', 
                                                        'params'=>array(
                                                            'id'=>$this->record['id'],
                                                            'path' => null
                                                    ))); ?>">
            <div class="d-flex mb-10">
                <img src="../../<?php echo 'media/upload/users/'.$_SESSION['user']['image']; ?>" alt="<?php echo $_SESSION['user']['fullname']; ?>">
                <textarea name="comment[content]" class="input-comment w-100" placeholder="Viết bình luận..."></textarea>
            </div>
            <div class="d-flex e-flex mb-10">
                <input type="submit" class="btn-submit btn-padding" value="Bình luận">
            </div>
            </form>
            <?php }else{ ?>
            <div class="border-around text-center mb-10">
                <p>Đăng nhập để bình luận</p>
            </div>
            <?php } ?>
            <div class="comment-content">
            <?php if($this->listComment) {?> 
                <?php foreach($this->listComment as $rows): ?>
                        <?php if(substr_count($rows['path'],'.') >= 2){ ?>
                            <div class="each-comment border-around mb-10 sub-cmt-2">
                        <?php }else if(substr_count($rows['path'],'.') == 1){ ?>
                            <div class="each-comment border-around mb-10 sub-cmt-1">
                        <?php }else{ ?>
                            <div class="each-comment border-around mb-10">
                        <?php } ?>
                    <div class="d-flex space-between">
                        <div class="user-info d-flex mb-10">
                            <img src="../../<?php echo 'media/upload/users/'.$rows['users_image']; ?>" alt="<?php echo $rows['users_fullname']; ?>">
                            <div>
                                <div class="d-flex">
                                    <a href="#"><p class="text-blue text-bold"><?php echo $rows['users_fullname']; ?></p></a>&ensp;
                                    <a href="#"><p class="text-light-gray">@<?php echo $rows['users_username']; ?></p></a>
                                </div>
                                <p class="text-light-gray"><?php echo $rows['created']; ?></p>
                            </div>
                        </div>
                        <!-- Start crud comment -->
                        <div class="crud-cmt d-flex">
                        <?php if(isset($_SESSION['user']) && $rows['user_id'] == $_SESSION['user']['id'] && $rows['status'] != "1"){ ?>
                            <a href="#" class="edit-link mr-16"><p class="text-light-gray"><i class="fa-solid fa-pen"></i></p></a>
                            <a href="<?php echo vendor_app_util::url(
								array('ctl'=>'comments', 
									  'act'=>'delete', 
									  'params'=>array(
										'id'=>$rows['id']
								))); ?>" class="btn-delete"><p class="text-light-gray"><i class="fa-solid fa-trash"></i></p></a>
                        <?php } ?>
                        </div>
                        <!-- End crud comment -->
                    </div>
                    <?php if($rows['status'] == "1"){ ?>
                    <!-- Start deleted comment -->
                        <div class="border-comment delete-background">
                            <p class="each-comment-text active"><?php echo $rows['content']; ?></p>
                        </div>
                    <!-- End deleted comment -->
                    <?php } else { ?>
                    <!-- Start comment content-->
                    <div class="border-comment">
                        <p class="each-comment-text active"><?php echo $rows['content']; ?></p>
                        <div class="edit-comment">
                            <form method="post" action="<?php echo vendor_app_util::url(
                                                            array('ctl'=>'comments', 
                                                                'act'=>'edit', 
                                                                'params'=>array(
                                                                    'id' => $rows['id']
                                                            ))); ?>">
                                <textarea name="comment[content]" class="input-comment w-100" placeholder="Nội dung bình luận"></textarea>
                                <div class="d-flex e-flex mb-10">
                                    <input type="submit" class="btn-edit btn-padding" value="Chỉnh sửa">
                                </div>
                            </form>
                        </div>
                    <!-- End comment content-->
                    <!-- Start interact comment-->
                        <div class="bottom-action d-flex align-center text-light-gray mb-10">
                            <a class="btn-like text-light-gray <?php echo in_array($rows['id'], $this->listLike) ? ' liked' : ''; ?>" href="<?php echo vendor_app_util::url(
                                                array('ctl'=>'likes', 
                                                    'act'=>'add', 
                                                    'params'=>array(
                                                        'id'=>$rows['id'],
                                                        'object_type_id'=> 2,
                                                ))); ?>"><i class="fa-solid fa-thumbs-up"></i></a>
                            <p class="total-like-cmt mr-16">&ensp;<?php echo $rows['total_like']; ?></p>
                            <a href="#" class="reply_link mr-16"><p class="text-light-gray">Trả lời</p></a>
                        </div>
                    <!-- End interact comment-->
                    </div>
                    <?php } ?>
                    <?php if(isset($_SESSION['user'])){ ?>
                    <div class="reply">
                    <form method="post" action="<?php echo vendor_app_util::url(
                                                    array('ctl'=>'comments', 
                                                        'act'=>'add', 
                                                        'params'=>array(
                                                            'id'=>$this->record['id'],
                                                            'path' => $rows['id']
                                                    ))); ?>">
                        <div class="d-flex mb-10">
                            <img src="../../<?php echo 'media/upload/users/'.$_SESSION['user']['image']; ?>" alt="<?php echo $_SESSION['user']['fullname']; ?>">
                            <textarea name="comment[content]" class="input-comment w-100" placeholder="Viết bình luận..."></textarea>
                        </div>
                        <div class="d-flex e-flex mb-10">
                            <input type="submit" class="btn-submit btn-padding" value="Bình luận">
                        </div>
                    </form>
                    </div>
                    <?php } ?>
                </div>
                <?php endforeach; ?>
                <?php } ?>
            </div>
        </div>
        <!-- End comment -->
    </div>
</div>
<!-- End main -->
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
<script src='../../media/js/comments.js'></script>
<script src='../../media/js/likes.js'></script>
<!-- Start footer -->
<!-- End footer -->
