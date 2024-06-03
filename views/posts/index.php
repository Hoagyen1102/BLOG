<!-- Start header -->
<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<!-- End header -->
<!-- Start crud -->
<div class="main container crud-wrapper">
	<h1 class="text-center">DANH SÁCH BÀI VIẾT</h1>
    <h3 class="d-flex e-flex w-100">
		<a href="<?php echo vendor_app_util::url(array('ctl'=>'posts', 'act'=>'add')); ?>" class="text-blue"><i class="fa-solid fa-plus"></i> Thêm bài viết</a>
	</h3><br>
    <table class="table-all-post">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
        <?php if($this->record) { 
			$i=0
		?>
			<?php while($row = mysqli_fetch_array($this->record)) : ?>
			  <tr>
				<td width="5%" scope="row"><?php echo ++$i; ?></td>
				<td width="25%"><?php echo $row['title']; ?></td>
				<td width="15%"><?php echo post_model::$status[$row['status']]; ?></td>
				<td width="24%"><?php echo $row['created']; ?></td>
				<td width="24%"><?php echo $row['updated']; ?></td> 
				<td width="7%">
				  	<a class="btn btn-outline-warning" role="button" href="<?php echo vendor_app_util::url(
								array('ctl'=>'posts', 
									  'act'=>'edit', 
									  'params'=>array(
										'slug'=>$row['slug']
								))); ?>">
					<i class="fas fa-edit mr-16"></i>
				  	</a>
				  	<a class="btn btn-outline-danger table-link danger delete" role="button" href="<?php echo vendor_app_util::url(
								array('ctl'=>'posts', 
									  'act'=>'delete', 
									  'params'=>array(
										'id'=>$row['id']
								))); ?>" >
					<i class="fas fa-trash"></i>
				  	</a>
				</td>
			  </tr>
			<?php endwhile; ?>
		<?php } else { ?>
			  <tr>
				<td colspan="7" scope="row">Hiện tại chưa có bài đăng!</td>
			  </tr>
		<?php }  ?>
        </tbody>
      </table>
</div>
<!-- End crud -->
<!-- Start footer -->
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
<!-- <script src='../../media/js/posts.js'></script> -->
<script>
$(document).ready(function() {
    $('.delete').on('click', function(event) {
        event.stopPropagation();
        var tc = $(this);
        var confirmation = confirm("Xác nhận xóa?");

        if (confirmation) {
            var url = tc.attr('href');

            $.ajax({
                url: url,
                method: 'post',
                dataType: 'json', 
            })
            .done(function(data) {
                if (data) {
                    tc.parent().parent().remove();
                    alert('Bài viết đã được xóa thành công!');
                }
            })
        }
        return false;
    });
});
</script>
</body>
</html>
<!-- End footer -->