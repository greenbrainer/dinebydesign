<?php
class Testimonial extends DataObject {

	private static $db = array(
		"Title"			=> 'Varchar(255)',
		'Author' 		=> 'Varchar', 
		'CompanyName'	=> 'Varchar(255)',
		'Content' 		=> 'HTMLText',
		'SortOrder'		=> 'Int',
		"IncludeOnHomepage" => "Boolean"
	);

	private static $has_one = array(
		'AuthorImage'	  => 'Image',
		'CaseStudy'		  => 'CaseStudyPage'
	);

	private static $belongs_many_many = array(
		'ServicesPages'	=> 'ServicesPage'
	);


	public static $default_sort='SortOrder';

	private static $summary_fields = array(
		"Title"		=> 'Title',
		'Author' 	=> 'Author',
		"YesNoHome" => "Include On Homepage"
	);

	public function YesNoHome(){
		if($this->IncludeOnHomepage==1){
			return "Yes";
		} else {
			return "No";
		}
	}

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