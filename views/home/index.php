<!-- Start header -->
<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<!-- End header -->
<!-- Start main -->
<div class="main">
    <div class="container d-flex">
        <div class="list-question w-75 mr-16" >
            <?php if($this->record) {?> 
                <?php foreach($this->record as $rows): ?>
                <div class="each-question d-flex">
                    <div class="w-25 text-center mr-16">
                        <a href="#"><img src="<?php echo 'media/upload/users/'.$rows['users_image']; ?>" alt="<?php echo $rows['users_fullname']; ?>" width="50px"></a>
                        <div class="auth">
                            <a class="text-blue" href="#"><?php echo $rows['users_fullname']; ?></a>
                        </div>
                    </div>
                    <div class="each-question-detail w-75">
                        <div class="title">
                            <h2><a href="<?php echo vendor_app_util::url(
                                        array('ctl'=>'posts', 
                                            'act'=>'view', 
                                            'params'=>array(
                                                'slug'=>$rows['slug']
                                        ))); ?>">
                                    <?php echo $rows['title']; ?></a></h2>
                        </div>
                        <div class="item d-flex align-center space-between mb-10">
                            <div class="left-item">
                                <span><i class="fa-regular fa-eye"></i><?php echo $rows['views']; ?></span>
                                <span><i class="fa-solid fa-thumbs-up"></i><?php echo $rows['total_like']; ?></span>
                                <span><i class="fa-solid fa-comments"></i><?php echo $this->cmt[$rows['id']]; ?></span>
                            </div>
                        </div>
                        <p class="text-light-gray">Đã đăng vào <?php echo $rows['created']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- Pagination Controls -->
                <div class="pagination text-center">
                    <?php if($this->currentPage > 1): ?>
                        <a href="?page=<?= $this->currentPage - 1 ?>">Previous</a>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $this->totalPages; $i++): ?>
                        <a href="?page=<?= $i ?>" class="<?= ($i == $this->currentPage) ? 'active' : '' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                    
                    <?php if($this->currentPage < $this->totalPages): ?>
                        <a href="?page=<?= $this->currentPage + 1 ?>">Next</a>
                    <?php endif; ?>
                </div>
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
                <?php if($this->topRecord) {?> 
                    <?php foreach($this->topRecord as $rows): ?>
                        <div class="each-sidebar mb-10">
                            <div class="title-sidebar title">
                                <h2><a href="<?php echo vendor_app_util::url(
                                                array('ctl'=>'posts', 
                                                    'act'=>'view', 
                                                    'params'=>array(
                                                        'slug'=>$rows['slug']
                                                ))); ?>">
                                            <?php echo $rows['title']; ?></a></h2>
                            </div>
                            <div class="item d-flex">
                                <span><i class="fa-regular fa-eye"></i><?php echo $rows['views']; ?></span>
                                <span><i class="fa-solid fa-thumbs-up"></i><?php echo $rows['total_like']; ?></span>
                                <span><i class="fa-solid fa-comments"></i><?php echo $this->cmt[$rows['id']]; ?></span>
                            </div>
                            <div class="text-mute-sidebar mb-10">
                                <a href="#"><?php echo $rows['users_fullname']; ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php } ?>
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