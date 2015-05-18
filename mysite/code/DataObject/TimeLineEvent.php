<?php
class TimeLineEvent extends DataObject {

    public static $db = array(
            "Title"         => "Varchar",
            "Name"          => 'Varchar',
            "Description"   => "HTMLText",
            "EventDate"     => "Date"
    );

    public static $has_one = array(
            "TimeLineImage"  => "Image",
            "AboutPage"     => "AboutPage"
    );

    function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeByName("TeamHolderPageID");
        $fields->removeByName("SortOrder");
        $fields->addFieldToTab('Root.Main',new TextField('Title',"Title"));
        $fields->addFieldToTab('Root.Main',new TextField('Name',"Name"));
        $fields->addFieldToTab('Root.Main',new TextAreaField('AboutMe',"About Me"));
        $fields->addFieldToTab('Root.Main',new TextField('TwitterURL'));
        $fields->addFieldToTab('Root.Main',new TextField('FacebookURL'));
        $fields->addFieldToTab('Root.Main',new TextField('Email', 'Email Address'));
        $fields->addFieldToTab('Root.Main',  $uploadField = new UploadField($name = 'TimeLineImage',$title = 'Upload a Photo'));
        $uploadField->setFolderName('TimeLineImages');
        $uploadField->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif')); 
        return $fields;
    }

}