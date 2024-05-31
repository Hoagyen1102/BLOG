<?php 
	global $obMediaFiles;
	array_push($obMediaFiles['css'], "media/css/sidebar.css");
?>
<div class="list-group">
	<a href="#" class="list-group-item active">
		<h4 class="list-group-item-heading">Management books</h4>
	</a>
	<a href="<?php echo vendor_app_util::url(array('ctl'=>'books')); ?>" class="list-group-item">List all books</a>
	<a href="<?php echo vendor_app_util::url(array('ctl'=>'books', 'act'=>'add')); ?>" class="list-group-item">Add new book</a>
</div>