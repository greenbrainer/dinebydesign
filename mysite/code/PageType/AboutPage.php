<?php
class AboutPage extends Page {

	private static $db = array(
		"SubHeadingLineOne"	=> "Varchar(255)",
		"SubHeadingLineTwo"	=> "Varchar(255)",
	);

	private static $has_one = array(
		'HeaderImage'		=> 'Image'
	);

	private static $has_many = array(
		"TeamMembers"		=> "TeamMember",
		"TimeLineEvents"	=> "TimeLineEvent",
		'CTABoxs'	=> 'CTABox'
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
		$fields->addFieldToTab("Root.Main", new TextField("SubHeadingLineOne", "Subheading Line 1"));
		$fields->addFieldToTab("Root.Main", new TextField("SubHeadingLineTwo", "Subheading Line 2"));

		$fields->addFieldToTab("Root.IconBoxes", new TextField("CTABoxTitle", "Icon Box Header"));

		$fields->addFieldToTab("Root.CTABlock", new TextField("CTABlockTitle", "Title"));
		$fields->addFieldToTab("Root.CTABlock", new TextField("CTABlockSubHeading", "Subheading"));
		$fields->addFieldToTab("Root.CTABlock", new TextField("CTABlockContent", "Content"));
		$fields->addFieldToTab("Root.CTABlock", new TextField("CTABlockLinkText", "Button Text"));
		$fields->addFieldToTab("Root.CTABlock", new TreeDropdownField("CTABlockTargetID", "Target Page", "SiteTree"));
		$fields->addFieldToTab("Root.Main", $uploadField = new UploadField("HeaderImage", "Page Header Image"));
		$uploadField->setFolderName('HeaderImages');

		//Stats
	    $gridFieldConfig = GridFieldConfig_RecordEditor::create();   
        $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
        $grid = new GridField('CTABoxs','CTABoxs', $this->CTABoxs()->sort("SortOrder"),$gridFieldConfig); 
		$grid->getConfig()->getComponentByType('GridFieldDetailForm')->setValidator(singleton('CTABox')->getCMSValidator()); 
		$fields->addFieldToTab('Root.IconBoxes', $grid);

		// Team Members
		$gridFieldConfig = GridFieldConfig_RecordEditor::create();   
        $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
        $grid = new GridField('TeamMembers','TeamMembers', $this->TeamMembers()->sort("SortOrder"),$gridFieldConfig); 
		// $grid->getConfig()->getComponentByType('GridFieldDetailForm')->setValidator(singleton('TeamMembers')->getCMSValidator()); 
		$fields->addFieldToTab('Root.TeamMembers', $grid);
		return $fields;
	}

}
class AboutPage_Controller extends Page_Controller {

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
