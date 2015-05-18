<?php
class ContentBlockHorz extends DataObject
{
    static $db = array (
        'Title' => 'Text',
        'Text'  => 'HTMLText',
        'ButtonTitle'  => 'Varchar',
        'TargetPageID'  => "Varchar",
        'ImageAlign' => "Enum(array('Left','Right','Background','Top Centre'))",
        "SortOrder"  => "Int"
    );

    static $has_one = array('Image' => 'Image', "Page" => "Page");
    
    public function getCMSFields(){
        $uploadField = new UploadField(
                $name = 'Image',
                $title = 'Upload a Image'
        );   
        $uploadField->setFolderName('ContentBlockHorzUploads');
        $uploadField->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));

        $ImageAlign = new DropdownField('ImageAlign','Image Align',singleton('ContentBlockHorz')->dbObject('ImageAlign')->enumValues());

        return new FieldList(
            new TextField('Title'),
            new TextField('ButtonTitle'),
            new HtmlEditorField('Text'),
            $uploadField,
            $ImageAlign,
            new TreeDropdownField("TargetPageID", "Target Page", "SiteTree")
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