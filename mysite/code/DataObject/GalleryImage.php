<?php
 
class GalleryImage extends DataObject {
 
  
  private static $db = array(	
	  'Title' => 'Varchar',
    'SortOrder' => 'Int'
  );
 
  // One-to-one relationship with gallery page
  private static $has_one = array(
    'Page'  => 'Page',
    'Image' => 'Image'
  );

 
 // tidy up the CMS by not showing these fields
  public function getCMSFields() {
 		$fields = parent::getCMSFields();
		$fields->removeFieldFromTab("Root.Main","PageID");
    $fields->removeFieldFromTab("Root.Main","SortOrder");
		return $fields;		
  }
  
  // Tell the datagrid what fields to show in the table
   private static $summary_fields = array( 
	   'Title' => 'Title'
   );
}