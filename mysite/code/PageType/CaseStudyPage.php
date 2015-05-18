<?php
class CaseStudyPage extends Page {

	private static $db = array(
		"Excerpt"	=> "Varchar(255)"
	);

	private static $has_one = array(
		"CaseStudyImage"	=> 'Image'
	);

	private static $has_many = array(
		"Testimonials"	=> 'Testimonial',
		'ContentTabs'	=> 'ContentTab',
		'GalleryImages'	=> 'GalleryImage'
	);

	private static $belongs_many_many = array(
		"CaseStudyPages"	=> "CaseStudyPage"
	);

	private static $can_be_root = false;
	private static $default_parent = "CaseStudiesHolderPage";

	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab("Root.Main", new TextField("Excerpt", "Excerpt"), "Content");
		$fields->addFieldToTab("Root.Main", $uploadField = new UploadField("CaseStudyImage", "Case Study Image"));
		$uploadField->setFolderName('CaseStudyImages');

		//Stats
	    $gridFieldConfig = GridFieldConfig_RecordEditor::create();
        $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
        $grid = new GridField('ContentTabs','ContentTabs', $this->ContentTabs()->sort("SortOrder"),$gridFieldConfig);  
		$fields->addFieldToTab('Root.ContentTabs', $grid);

		$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		$gridFieldConfig->addComponent(new GridFieldBulkUpload());
        $grid = new GridField('GalleryImages','GalleryImages', $this->GalleryImages(), $gridFieldConfig);  
		$fields->addFieldToTab('Root.GalleryImages', $grid);


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
class CaseStudyPage_Controller extends Page_Controller {
	/**
	 * Initialise the controller
	 * 
	 * @return [type] [description]
	 */
	public function init() {
		parent::init();
	}

	public function formattedDate(){
		return 'hi';//$this->Created()->format("d.m.y");
	}

}
