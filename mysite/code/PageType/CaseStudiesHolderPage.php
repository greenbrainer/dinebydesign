<?php
class CaseStudiesHolderPage extends Page {

	private static $db = array(
		"SubHeadingLineOne"	=> "Varchar(255)",
		"SubHeadingLineTwo"	=> "Varchar(255)"
	);

	private static $has_one = array(
		// 'PageImage'	=> 'Image'
	);

	private static $has_many = array(
		// "CaseStudiesPage"			=> "CaseStudiesPage"
	);

	private static $allowed_children = array(
		"CaseStudyPage"
	);

	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab("Root.Main", new TextField("SubHeadingLineOne", "Subheading Line 1"), "Content");
		$fields->addFieldToTab("Root.Main", new TextField("SubHeadingLineTwo", "Subheading Line 2"), "Content");
		// $fields->addFieldToTab("Root.Main", new UploadField("PageImage", "Page Image"));
		$fields->removeByName("Content");
		$fields->removeByName("PromoText");
		$fields->removeByName("Tabs");
		$fields->removeByName("Accordian");
		$fields->removeByName("BlockVertical");
		$fields->removeByName("BlockHorizontal");
		$fields->removeByName("CallToActionBlocks");
		$fields->removeByName("SideBar");
		return $fields;
	}

}
class CaseStudiesHolderPage_Controller extends Page_Controller {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();
		// You can include any CSS or JS required by your project here.
		// See: http://doc.silverstripe.org/framework/en/reference/requirements
	}

}
