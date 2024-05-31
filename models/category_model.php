<?php
class category_model extends  vendor_frap_model {
	public static $status = [
						0 => 'Disable',
						1 => 'Enable'
					];

	public function rules() {
		global $app;
	    return [
        	'category_name'			=> ['required', 'string', ['max', 'value'=>20]],
	    ];
	}

	protected $relationships = [
//
	];
}
?>