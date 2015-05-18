<?php
class ServicesPage extends Page {

	private static $db = array(
		"SubHeadingLineOne"	=> "Varchar(255)",
		"SubHeadingLineTwo"	=> "Varchar(255)",
		"IsCoreService"		=> 'Boolean'
	);

	private static $has_one = array(
		"Image"					=> "Image",
		// 'ServicesHolderPage'	=> 'ServicesHolderPage'
	);

	private static $has_many = array(
		'CTABoxs'	=> 'CTABox'		
	);

	private static $many_many = array(
		"Testimonials"	=> 'Testimonial',
		'CaseStudyPages'=> 'CaseStudyPage'
	);
	private static $can_be_root = false;
	private static $default_parent = "ServicesHolderPage";

	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab("Root.IconBoxes", new TextField("CTABoxTitle", "Icon Box Header"));
		
		$fields->addFieldToTab("Root.Main", new TextField("SubHeadingLineOne", "Subheading Line 1"), "Content");
		$fields->addFieldToTab("Root.Main", new TextField("SubHeadingLineTwo", "Subheading Line 2"), "Content");
		$fields->addFieldToTab("Root.Main", $uploadField = new UploadField("Image", "Service Image"));
		$uploadField->setFolderName('SettingPhotos');
		$fields->addFieldToTab("Root.Core", new CheckboxField("IsCoreService", "Is this a core service?"));

		//Stats
	    $gridFieldConfig = GridFieldConfig_RecordEditor::create();
        $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
        $grid = new GridField('CTABoxs','CTABoxs', $this->CTABoxs()->sort("SortOrder"),$gridFieldConfig); 
		$grid->getConfig()->getComponentByType('GridFieldDetailForm')->setValidator(singleton('CTABox')->getCMSValidator()); 
		$fields->addFieldToTab('Root.IconBoxes', $grid);

		//Stats
	    $gridFieldConfig = GridFieldConfig_RelationEditor::create();
        $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
        $grid = new GridField('Testimonials','Testimonials', $this->Testimonials()->sort("SortOrder"),$gridFieldConfig);  
		$fields->addFieldToTab('Root.Testimonials', $grid);

		//Stats
	    $gridFieldConfig = GridFieldConfig_RelationEditor::create();
        $grid = new GridField('CaseStudyPages','CaseStudyPages', $this->CaseStudyPages()->sort("Title"),$gridFieldConfig);  
		$fields->addFieldToTab('Root.CaseStudyPages', $grid);

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
class ServicesPage_Controller extends Page_Controller {

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();
	}

	public function GetTestimonials($limit = 4){
		return $this->Testimonials()->Sort("Created")->limit($limit);
	}

}
