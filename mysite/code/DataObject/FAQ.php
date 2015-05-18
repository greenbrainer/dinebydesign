<?php
class FAQ extends DataObject {

	private static $db = array(
		'Question' 		=> 'Varchar', 
		'Answer' 		=> 'HTMLText',
		'SortOrder'		=> 'Int'
	);

	private static $has_one = array(
		'FAQPage' => 'FAQPage'
	);


	public static $default_sort='SortOrder';

	private static $summary_fields = array(
		'Question' 	=> 'Question'
	);

	public function getCMSFields() {
		
		$fields = parent::getCMSFields();
		$fields->removeByName("SortOrder");

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