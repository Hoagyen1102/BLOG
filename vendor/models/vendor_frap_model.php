<?php
class vendor_frap_model extends vendor_fra_model {
	public $nopp = 20;
	/*
	$options 			:	multidimensional array
	$options['joins']	:	array with items are all of model would to join 
	*/
	public function allp($fields='*', $options=null) {
		global $app;
		$pagination = [];
		$options['pagination'] = isset($options['pagination'])? $options['pagination']: [];
		$options['pagination']['page'] = isset($app['prs']['p'])?	$app['prs']['p']: 1;
		$options['pagination']['nopp'] = isset($options['pagination']['nopp'])?	$options['pagination']['nopp']: $this->nopp;

		$resultMObject = parent::getRecords($fields, $options);
		$pagination['data'] = [];
		if($resultMObject) {
			while($row = $resultMObject->fetch_assoc()) {
	    		$pagination['data'][] = $row;
	    	}
		}
		$pagination['norecords']= parent::getCountRecords($options);
		$pagination['nocurp'] 	= count($pagination['data']);
		$pagination['curp'] 	= $this->curp;
		$pagination['nopp'] 	= $this->nopp;
		return $pagination;
	}
}
?>
