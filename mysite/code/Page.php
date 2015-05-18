<?php
class Page extends SiteTree {

	private static $db = array(
		"PromoText"				=> 'Text',
		'PromoButtonText'		=> 'Varchar',
		"PromoLink"				=> 'Varchar',
		'HasSideBar'			=> 'Boolean',
		'InheritSideBar'		=> 'Boolean',
		'ShowTwitter'			=> 'Boolean',
		'ShowLatestBlog'		=> 'Boolean',
		'SidebarBlogPosts'		=> 'Int',
		'ShowTestimonials'		=> 'Boolean',
		'SideBarTestimonials'	=> 'Int',
		'ShowSharingTool'		=> 'Boolean',
		"CTABoxTitle" => "Text"
	);

	private static $has_one = array(
	);

	private static $has_many = array(
		'VerticalContentBlocks' 	=> 'ContentBlockVertical',
		'HorizontalContentBlocks' 	=> 'ContentBlockHorz',
		"CallToActionBlocks" 		=> "CallToActionBlock",
		"ContentTabs" 				=> "ContentTab",
		"AccordianElements"			=> "AccordianElement"
	);

	function getCMSFields() {
		$fields = parent::getCMSFields();
		// $fields->addFieldToTab("Root.PromoText", new TextareaField("PromoText"));
		// $fields->addFieldToTab("Root.PromoText", new TextField("PromoButtonText"));
		// $fields->addFieldToTab("Root.PromoText", new TextField("PromoLink"));

		//  //Tabs
	 //    $gridFieldConfig = GridFieldConfig_RecordEditor::create();   
  //       $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
  //       $grid = new GridField('ContentTabs','Tabs', $this->ContentTabs()->sort("SortOrder"),$gridFieldConfig); 
		// $grid->getConfig()->getComponentByType('GridFieldDetailForm')->setValidator(singleton('ContentTab')->getCMSValidator()); 
		// $fields->addFieldToTab('Root.Tabs', $grid);

		// //Accordian
	 //    $gridFieldConfig = GridFieldConfig_RecordEditor::create();   
  //       $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
  //       $grid = new GridField('AccordianElements','Accordian', $this->AccordianElements()->sort("SortOrder"),$gridFieldConfig); 
		// $grid->getConfig()->getComponentByType('GridFieldDetailForm')->setValidator(singleton('AccordianElement')->getCMSValidator()); 
		// $fields->addFieldToTab('Root.Accordian', $grid);

		// $gridFieldConfig  = GridFieldConfig_RecordEditor::create();
		// $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
  //       $VerticalContentBlocks = new GridField("VerticalContentBlocks", "Block Vertical", $this->VerticalContentBlocks(), $gridFieldConfig);
  //       $VerticalContentBlocks->getConfig()->getComponentByType('GridFieldDetailForm')->setValidator(singleton('ContentBlockVertical')->getCMSValidator()); 
  //       $fields->addFieldToTab('Root.BlockVertical', $VerticalContentBlocks);

  //       $gridFieldConfig  = GridFieldConfig_RecordEditor::create();
  //       $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
  //       $HorizontalContentBlocks = new GridField("HorizontalContentBlocks", "Block Horz", $this->HorizontalContentBlocks(), $gridFieldConfig);
  //       $HorizontalContentBlocks->getConfig()->getComponentByType('GridFieldDetailForm')->setValidator(singleton('ContentBlockHorz')->getCMSValidator()); 
		// $fields->addFieldToTab('Root.BlockHorizontal', $HorizontalContentBlocks);

  //       $gridFieldConfig = GridFieldConfig_RecordEditor::create();   
  //       $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
  //       $grid = new GridField('CallToActionBlocks', 'CallToActionBlocks', $this->CallToActionBlocks(),$gridFieldConfig); 
  //       $grid->getConfig()->getComponentByType('GridFieldDetailForm')->setValidator(singleton('CallToActionBlock')->getCMSValidator()); 
  //       $fields->addFieldToTab('Root.CallToActionBlocks', $grid);

  //       $fields->addFieldToTab("Root.SideBar", new CheckboxField("HasSideBar", "Show Sidebar on this page"));
  //       $fields->addFieldToTab("Root.SideBar", new CheckboxField("InheritSideBar", "Use default items (defined in settings)"));
  //       $fields->addFieldToTab("Root.SideBar", $twitterToggle = new CheckboxField("ShowTwitter", "Show Twitter widget"));
  //       if (strlen(SiteConfig::current_site_config()->TwitterUser) == 0){
  //       	$twitterToggle->setDisabled(true);
  //       	$twitterToggle->setTitle("Show Twitter widget (Please enter a Twitter user in settings)");

  //       }        
  //       $fields->addFieldToTab("Root.SideBar", new CheckboxField("ShowLatestBlog", "Show latest blog posts"));
  //       $fields->addFieldToTab("Root.SideBar", new NumericField("SidebarBlogPosts", "Number of posts to show"));
  //       $fields->addFieldToTab("Root.SideBar", new CheckboxField("ShowTestimonials", "Show testimonials"));
  //       $fields->addFieldToTab("Root.SideBar", new NumericField("SideBarTestimonials", "Number of testimonials to show"));
  //       $fields->addFieldToTab("Root.SideBar", $sharingToolToggle = new CheckboxField("ShowSharingTool", "Show sharing tool"));
  //       if (!SiteConfig::current_site_config()->TwitterUser){
  //       	$sharingToolToggle->setDisabled(true);
  //       	$sharingToolToggle->setTitle("Show sharing tool (Please enter a sharing tool ID in settings)");

  //       }

		return $fields;
	}

}

class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
		"themecss", 'ContactForm', 'BrochureForm'
	);

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();
	}

	/**
	 * Creates the contact form
	 *
	 * @return ContactForm
	 */
	public function ContactForm() {
		$form = new ContactForm($this, 'ContactForm');

		return $form;
	}

	/**
	 * Success contact form submission
	 *
	 * @return boolean
	 */
	public function Success() {
		return isset($_REQUEST['success']) && $_REQUEST['success'] == "1";
	}

	/**
	 * Get the contact page thank you message
	 * 
	 * @return String
	 */
	public function getThankyouMessage(){
		$contactPage = ContactPage::get()->First();

		if ($contactPage) {
			return $contactPage->ThankyouMessage;
		}

		return null;
	}

	/**
	 * Brochure subscribe to mailing list and send brochure to email
	 *
	 * @return Form
	 */
	public function BrochureForm() {
		$form = new BrochureForm($this, 'BrochureForm');

		$form->loadDataFrom($this->request->postVars());
		$form->setTemplate('BrochureForm');

		return $form;
	}

	public function themecss(){
		$this->response->addHeader( 'Content-type', 'text/css' ); 
      	return $this->renderWith( 'themecss' ); 
	}	

	public function getCoreServices($limit = 4){
		return DataObject::get("ServicesPage")->where("IsCoreService = '1'")->Sort("ID")->limit($limit);
	}

	public function getNonCoreServices($limit = 4){
		return DataObject::get("ServicesPage")->where("IsCoreService = '0'")->Sort("ID")->limit($limit);
	}

	public function GetTestimonials($limit = 4){
		return DataObject::get("Testimonial")->Sort("Created")->limit($limit);
	}

	function getLatestBlogPost($limit = 1){
		return DataObject::get("BlogPost")->Sort("Created")->limit($limit);
	}

	function getServicesPages(){
		return DataObject::get("ServicesPage");
	}

	function Year(){
		$date = new DateTime("Tomorrow");
		return $date->format("Y");
	}
}
