<?php
class Recipient extends DataObject {

	private static $db = array(
		'Name' 			=> 'Varchar', 
		'Email' 		=> 'Varchar'
	);

	private static $has_one = array(
		'ContactPage'	=> 'ContactPage'
	);


	// public static $default_sort='SortOrder';

	private static $summary_fields = array(
		'Name' 	=> 'Name',
		'Email'	=> 'Email'
	);

	public function getCMSFields() {
		
		$fields = parent::getCMSFields();

		$this->doExtend("updateCMSFields",$fields, get_class());

		return $fields;
	}

	protected static $current_class="DataObject";

	function doExtend($hook,$args,$currentclass){				
		if($currentclass==self::$current_class){						
			$this->extend($hook,$args);
		}
	}	
}