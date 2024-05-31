<?php
class like_model extends  vendor_frap_model {
	public static $status = [
						0 => 'Disable',
						1 => 'Enable'
					];

	public function rules() {
		global $app;
	    return [
        	'user_id'				=> ['required', 'integer',['max', 'value'=>11]],
	        'object_id'				=> ['required', 'integer',['max', 'value'=>11]],
	        'object_type_id'		=> ['required', 'integer',['max', 'value'=>11]]
	    ];
	}

	protected $relationships = [
		'belongTo'	=>	[
			['user','key'=>'user_id'],	
			['object','key'=>'object_id'],		
			['object_type','key'=>'object_type_id']		
		]
	];
}
?>