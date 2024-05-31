<!-- Start header -->
<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<!-- End header -->
<!-- Start crud -->
<div class="main crud-wrapper">
    <div class="container">
        <h1 class="text-center">Chỉnh sửa bài viết</a></h1><br>
		<form method="post" action="<?php echo vendor_app_util::url(array('ctl'=>'posts', 
                                                                    'act'=>'edit', 
                                                                    'params'=>array(
                                                                        'slug'=>$this->record['slug']
                                                                ))); ?>">
            <p>Tiêu đề:</p>
            <input type="text" name="post[title]" class="input-crud mb-10" value="<?php echo $this->record['title'];?>">
            <p>Thể loại:</p>
            <select name="post[category_id]" id="post[category_id]" class="input-crud mb-10">
            <?php while($row = mysqli_fetch_array($this->categories)) : ?>
            <option value="<?php echo $row['id']?>"><?php echo $row['category_name']?></option>
            <?php endwhile; ?>
            </select>
            <p>Nội dung:</p>
            <textarea id="editor" name="post[content]"><?php echo $this->record['content']?></textarea>
            <br>
            <div class="d-flex e-flex">
                <?php if ($this->record['status'] == 0){ ?>
                    <input type="submit" class="btn-save btn-padding mr-16" name="btn-save-draft" value="Lưu bản nháp">
                    <input type="submit" class="btn-submit btn-padding" name="btn-submit" value="Đăng tải">
                <?php }else{ ?>
                    <input type="submit" class="btn-save btn-padding mr-16" name="btn-save-draft" value="Dừng đăng tải và lưu">
                    <input type="submit" class="btn-submit btn-padding" name="btn-submit" value="Lưu bài viết">
                <?php } ?>
            </div>
        </form>
    </div>
    </div>
</div>
<!-- End crud -->
<!-- Start footer -->
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
<!-- End footer -->