<?php
class ContentBlockVertical extends DataObject
{
    static $db = array (
        'Title' => 'Text',
        'Text'  => 'HTMLText',
        'ButtonTitle'  => 'Varchar',
        'TargetPageID'  => "Varchar",
        "ShowTextAndButton" => "Boolean",
        "SortOrder"     => "Int"
    );

    static $has_one = array('Image' => 'Image', "Page" => "Page");
    
    public function getCMSFields(){
        
        $uploadField = new UploadField(
                $name = 'Image',
                $title = 'Upload a Image'
        );   
        $uploadField->setFolderName('ContentBlockVerticalUploads');
        $uploadField->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));

        return new FieldList(
            new TextField('Title'),
            new TextField('ButtonTitle'),
            new HtmlEditorField('Text'),
            $uploadField,
            new TreeDropdownField("TargetPageID", "Target Page", "SiteTree"),
            new CheckboxField("ShowTextAndButton", "Show Text And Button (Tick for Yes)")
        );
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

    /**
     * Set the CMS required fields
     * 
     * @return RequiredFields
     */
    public function getCMSValidator() {
        return new RequiredFields(array(
            'Title'
        ));
    }
}