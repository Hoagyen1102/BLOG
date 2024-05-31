<?php
class post_model extends  vendor_frap_model {
	public static $status = [
						0 => 'Bản nháp',
						1 => 'Đã đăng tải'
					];

	public function rules() {
		global $app;
	    return [
        	'title'				=> ['required', 'string', ['max', 'value'=>255]],
        	'slug'				=> ['required', 'string', ['max', 'value'=>255]],
        	'content'			=> ['required', 'string'],
        	'views'				=> ['required', 'integer',['max', 'value'=>11]],
        	'total_like'		=> ['required', 'integer',['max', 'value'=>11]],
        	'user_id'			=> ['required', 'integer',['max', 'value'=>11]],
	        'status'			=> [['inlist', 'value'=>array_keys(self::$status)]],
        	'category_id'		=> ['required', 'integer',['max', 'value'=>11]],
	    ];
	}

	protected $relationships = [
		'belongTo' => [
			['user', 'key' => 'user_id'],
			['category', 'key' => 'category_id']
		],
		'hasmany' => [
			['comment', 'post_id' => 'key'],
			['like', 'post_id' => 'key']
		]
	];	
}
?>