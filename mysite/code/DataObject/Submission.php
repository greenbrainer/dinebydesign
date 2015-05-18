<?php
class Submission extends DataObject {

	private static $db = array(
		'Name' 			=> 'Varchar', 
		'Email' 		=> 'Varchar',
		'Phone'			=> 'Varchar',
		"CallBackTime"	=> 'Varchar',
		"Subject"		=> 'Varchar',
		"Message"		=> 'Text'
	);

	private static $has_one = array(
		'ContactPage'	=> 'ContactPage'
	);

	private static $summary_fields = array(
		'Name' 			=> 'Name',
		'Email'			=> 'Email',
		'Created.Nice'	=> 'Date'
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