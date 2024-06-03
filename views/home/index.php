<!-- Start header -->
<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<!-- End header -->
<!-- Start main -->
<div class="main">
    <div class="container d-flex">
        <div class="list-question w-75" >
            <?php if($this->record) {?> 
                <?php foreach($this->record as $rows): ?>
                <div class="each-question d-flex">
                    <a href="#"><img src="<?php echo 'media/upload/users/'.$rows['users_image']; ?>" alt="<?php echo $rows['users_fullname']; ?>" width="37px"></a>
                    <div class="each-question-detail">
                        <div class="auth">
                            <a class="text-blue" href="#"><?php echo $rows['users_fullname']; ?></a>
                        </div>
                        <div class="title">
                            <h2><a href="<?php echo vendor_app_util::url(
                                        array('ctl'=>'posts', 
                                            'act'=>'view', 
                                            'params'=>array(
                                                'slug'=>$rows['slug']
                                        ))); ?>">
                                    <?php echo $rows['title']; ?></a></h2>
                        </div>
                        <div class="item d-flex align-center space-between">
                            <div class="left-item">
                                <span><i class="fa-regular fa-eye"></i><?php echo $rows['views']; ?></span>
                                <span><i class="fa-solid fa-thumbs-up"></i><?php echo $rows['total_like']; ?></span>
                                <span><i class="fa-solid fa-comments"></i><?php echo $this->cmt[$rows['id']]; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php } else { ?>
                <div class="text-center"><p>Chưa có bài viết nào được đăng tải!</p></div>  
            <?php }  ?>
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
</div>
<!-- End main -->
<!-- Start footer -->
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
</body>
</html>
<!-- End footer -->