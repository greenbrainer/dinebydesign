<?php
class Spinner extends DataObject {

	private static $db = array(
		'Title' 		=> 'Varchar', 
		'Caption' 		=> 'Varchar',
		'Link'			=> 'Varchar',
		'LinkTarget'	=> 'Varchar',
		'SortOrder'		=> 'Int'
	);

	private static $has_one = array(
		'Image' => 'Image',
		'HomePage' => 'HomePage'
	);


	public static $default_sort='SortOrder';

	private static $summary_fields = array(
		'Thumbnail' => 'Thumbnail',
		'Title' 	=> 'Title'
	);

	public function getCMSFields() {
		
		$fields = parent::getCMSFields();
		$fields->removeByName("SortOrder");
		$uploadField = UploadField::create('Image', 'Image');
		$uploadField->setFolderName('SpinnerImages');
		$fields->addFieldToTab('Root.Main', $uploadField);

		$this->doExtend("updateCMSFields",$fields, get_class());

		return $fields;
	}

	public function getThumbnail() {
		return $this->Image()->PaddedImage(50, 50);
	}

	protected static $current_class="DataObject";

	function doExtend($hook,$args,$currentclass){				
		if($currentclass==self::$current_class){						
			$this->extend($hook,$args);
		}
	}	
}