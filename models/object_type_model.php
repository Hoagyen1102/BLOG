<?php
class object_type_model extends  vendor_frap_model {
	public static $status = [
						0 => 'Disable',
						1 => 'Enable'
					];

	public function rules() {
		global $app;
	    return [
        	'type_name'				=> ['required', 'string', ['max', 'value'=>20]],
	    ];
	}

	protected $relationships = [
//
	];
}
?>