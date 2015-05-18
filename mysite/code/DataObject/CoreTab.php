<?php
 
class CoreTab extends DataObject {
 
  
  private static $db = array(	
	  'Title' => 'Varchar',
    'Content' => 'HTMLText',
    'SortOrder' => 'Int',
    'TargetPageID'  => "Varchar",
  );
 
  // One-to-one relationship with gallery page
  private static $has_one = array(
    'HomePage' => 'HomePage'	
  );

 
 // tidy up the CMS by not showing these fields
  public function getCMSFields() {
 		$fields = parent::getCMSFields();
		$fields->removeFieldFromTab("Root.Main","HomePageID");
    $fields->removeFieldFromTab("Root.Main","SortOrder");
    $fields->addFieldToTab('Root.Main',new TreeDropdownField("TargetPageID", "Select a page to link to", "SiteTree"));
		return $fields;		
  }
  
  // Tell the datagrid what fields to show in the table
   private static $summary_fields = array( 
	   'Title' => 'Title'
   );
   public function getCMSValidator() { 
      return new CoreTab_Validator(); 
    } 

    public function getValidator() { 
      return new CoreTab_Validator(); 
    } 

    public function CTALink(){
        if ($this->TargetPageID > 0){
            //$URLString = DataObject::get_by_id("SiteTree", $this->TargetPageID)->Link();
            $URLData = DataObject::get_by_id("SiteTree", $this->TargetPageID);
            if (is_object($URLData)){
                $URLString = $URLData->Link();
            } else {
                $URLString = $this->TargetPageID;
            }
            return $URLString;
        } else {
            return false;
        }
    }
  
}

class CoreTab_Validator extends RequiredFields { 
   function php($data) { 
      $bRet = parent::php($data);
        if (empty($data['Title'])) { 
            $this->validationError('Title','Title is required',"required"); 
            $bRet = false; 
        }

        if (empty($data['Content'])) { 
         $this->validationError('Content','Content is required',"required"); 
         $bRet = false; 
        }

        return $bRet; 
   } 
}