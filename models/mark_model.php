<?php
class mark_model extends  vendor_frap_model {
	public static $status = [
						0 => 'Disable',
						1 => 'Enable'
					];

	public function rules() {
		global $app;
	    return [
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