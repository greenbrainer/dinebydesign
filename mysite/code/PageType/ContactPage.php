<?php
class ContactPage extends Page {

	private static $db = array(
		"Subject"			=> "Varchar(255)",
		"FromAddress"		=> 'Varchar(255)',
		"ThankyouMessage"	=> 'Varchar(255)'
	);

	private static $has_one = array(
		'HeaderImage'		=> 'Image'
	);

	private static $has_many = array(
		"Submissions"	=> 'Submission',
		'Recipients'	=> 'Recipient'
	);

	public function getCMSFields(){
		$fields = parent::getCMSFields();
		
		$fields->removeByName("PromoText");
		$fields->removeByName("Tabs");
		$fields->removeByName("Accordian");
		$fields->removeByName("BlockVertical");
		$fields->removeByName("BlockHorizontal");
		$fields->removeByName("CallToActionBlocks");
		$fields->removeByName("SideBar");

		$fields->addFieldToTab("Root.Configuration", new TextField("Subject", "Email Subject"));
		$fields->addFieldToTab("Root.Configuration", new TextField("ThankyouMessage", "Thank you message"));
		$fields->addFieldToTab("Root.Configuration", new TextField("FromAddress", "From Address"));

		// Recipients
		$fields->addFieldToTab("Root.Configuration", new HeaderField("Recipients", "Email Recipients"));
	    $gridFieldConfig = GridFieldConfig_RecordEditor::create();   
        $grid = new GridField('Recipients','Recipients', $this->Recipients(),$gridFieldConfig); 
		$fields->addFieldToTab('Root.Configuration', $grid);

		//Submissions
	    $gridFieldConfig = GridFieldConfig_RecordEditor::create(); 
        $grid = new GridField('Submissions','Submissions', $this->Submissions(),$gridFieldConfig); 
		$fields->addFieldToTab('Root.Submissions', $grid);
		
		return $fields;
	}

}

/**
 * Represents the contact page that creates the contact form and it's submission
 * 
 * @author Julius Caamic <julius@greenbrainer.com>
 * @copyright (c) Copyright 2015, Julius Caamic
 */
class ContactPage_Controller extends Page_Controller {

	/**
	 * Initialise controller
	 */
	public function init() {
		parent::init();
	}
}
