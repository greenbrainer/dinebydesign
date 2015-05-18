<?php
class HomePage extends Page {

	private static $db = array(
		"BannerHeadingLine1"			=> 'Text',
		"BannerHeadingLine2"			=> 'Text',
		'BannerSubTextLine1'			=> 'Text',
		'BannerSubTextLine2'			=> 'Text',
		'HeadingTwo'			=> 'Text',
		"CTABlockTitle"			=> 'Varchar(255)',
		"CTABlockSubHeading"	=> 'Varchar(255)',
		"CTABlockContent"		=> 'Varchar(255)',
		"CTABlockLinkText"		=> 'Varchar'
	);

	private static $has_one = array(
		"CTABlockTarget"	=> "SiteTree",
		'BannerLinkTarget'	=> 'SiteTree'
	);

	private static $has_many = array(
		"Spinners"			=> "Spinner",
		'StatisticsBoxes'	=> 'StatisticsBox',
		"HomepageCtaSliders" => "HomepageCtaSlider",
		"CoreTabs" => "CoreTab"
	);

	public function getCMSFields(){
		$fields = parent::getCMSFields();
		
		$fields->removeByName("PromoText");
		$fields->removeByName("Tabs");
		$fields->removeByName("Accordian");
		$fields->removeByName("BlockVertical");
		$fields->removeByName("BlockHorizontal");
		//$fields->removeByName("CallToActionBlocks");
		$fields->removeByName("SideBar");
		$fields->addFieldToTab("Root.Main", new TextField("HeadingTwo", "Heading 2"));
		$fields->addFieldToTab("Root.Banner", new TextField("BannerHeadingLine1", "Banner Heading Line 1"));
		$fields->addFieldToTab("Root.Banner", new TextField("BannerHeadingLine2", "Banner Heading Line 2"));
		$fields->addFieldToTab("Root.Banner", new TextField("BannerSubTextLine1", "Banner Sub Text Line 1"));
		$fields->addFieldToTab("Root.Banner", new TextField("BannerSubTextLine2", "Banner Sub Text Line 2"));
		$fields->addFieldToTab("Root.Banner", new TreeDropdownField("BannerLinkTargetID", "Target Page", "SiteTree"));

		$fields->addFieldToTab("Root.CTABlock", new TextField("CTABlockTitle", "Title"));
		$fields->addFieldToTab("Root.CTABlock", new TextField("CTABlockSubHeading", "Subheading"));
		$fields->addFieldToTab("Root.CTABlock", new TextField("CTABlockContent", "Content"));
		$fields->addFieldToTab("Root.CTABlock", new TextField("CTABlockLinkText", "Button Text"));
		$fields->addFieldToTab("Root.CTABlock", new TreeDropdownField("CTABlockTargetID", "Target Page", "SiteTree"));

		//Accordian
	    $gridFieldConfig = GridFieldConfig_RecordEditor::create();   
        $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
        $grid = new GridField('StatisticsBoxes','StatisticsBoxes', $this->StatisticsBoxes()->sort("SortOrder"),$gridFieldConfig); 
		$grid->getConfig()->getComponentByType('GridFieldDetailForm')->setValidator(singleton('StatisticsBox')->getCMSValidator()); 
		$fields->addFieldToTab('Root.StatisticBoxes', $grid);


		$gridFieldConfig  = GridFieldConfig_RecordEditor::create();
        $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
        $HomepageCtaSliders = new GridField("HomepageCtaSliders", "CTA Slider", $this->HomepageCtaSliders(), $gridFieldConfig);
        $HomepageCtaSliders->getConfig()->getComponentByType('GridFieldDetailForm')->setValidator(singleton('HomepageCtaSlider')->getCMSValidator()); 
		$fields->addFieldToTab('Root.CTA Slider', $HomepageCtaSliders);

		$gridFieldConfig  = GridFieldConfig_RecordEditor::create();
        $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
        $CoreTabs = new GridField("CoreTabs", "Tabs", $this->CoreTabs(), $gridFieldConfig);
        $CoreTabs->getConfig()->getComponentByType('GridFieldDetailForm')->setValidator(singleton('CoreTab')->getCMSValidator()); 
		$fields->addFieldToTab('Root.Tabs', $CoreTabs);

		return $fields;
	}

}
class HomePage_Controller extends Page_Controller {

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
	}


	public function GetHomepageTestimonials(){
		return DataObject::get("Testimonial")->Where("IncludeOnHomepage='1'")->Sort("Created");
	}

}
