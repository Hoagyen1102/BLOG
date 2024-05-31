<?php
class comment_model extends  vendor_frap_model {
	public static $status = [
						0 => 'Đã đăng tải',
						1 => 'Đã xóa'
					];

	public function rules() {
		global $app;
	    return [
        	'path'					=> ['required', 'ltree'],
        	'content'				=> ['required', 'integer',['max', 'value'=>11]],
        	'total_like'			=> ['required', 'integer',['max', 'value'=>11]],
        	'user_id'				=> ['required', 'integer',['max', 'value'=>11]],
	        'post_id'				=> ['required', 'integer',['max', 'value'=>11]]
	    ];
	}

	protected $relationships = [
		'belongTo'	=>	[
			['user','key'=>'user_id'],		
			['post','key'=>'post_id']		
		]		
	];
}
?>