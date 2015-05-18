<?php
 
class StatisticsBox extends DataObject {
 
  
  private static $db = array(	
	  	'Title' => 'Varchar',
	    'Content' => 'Text',
	    'SortOrder' => 'Int'
  );
 
  // One-to-one relationship with gallery page
  private static $has_one = array(
    'Page'            => 'Page',
    'Image'           => 'File',
    'BackgroundImage' => 'Image'
  );

 
 // tidy up the CMS by not showing these fields
  public function getCMSFields() {
 		$fields = parent::getCMSFields();
		$fields->removeFieldFromTab("Root.Main","PageID");
  	$fields->removeFieldFromTab("Root.Main","SortOrder");
  	$fields->replaceField("Image", $uploadField = new UploadField("Image", "Statistics Box Image (SVG Only)"));
    $uploadField->setFolderName('StatisticsImages');
  	$uploadField->setAllowedExtensions(array('svg'));
		return $fields;		
  }

  function formatTitleForOdometer(){
  	return str_replace('.', '</span>.<span class="jsOdometer">',$this->Title);
  }
  
  // Tell the datagrid what fields to show in the table
   private static $summary_fields = array( 
	   'Title' => 'Title'
   );
   public function getCMSValidator() { 
      return new StatisticsBox_Validator(); 
    } 

    public function getValidator() { 
      return new StatisticsBox_Validator(); 
    } 
  
}

class StatisticsBox_Validator extends RequiredFields { 
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