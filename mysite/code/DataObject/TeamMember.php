<?php
class TeamMember extends DataObject {

    public static $db = array(
            "Name"          => 'Varchar(255)',
            'Position'      => 'Varchar(255)',
            "AboutMe"       => "Text",
            "Mobile"        => "Varchar",
            "LinkedIn"      => "Varchar",
            "Email"         => 'Varchar',
            "SortOrder" =>"Int"
    );

    public static $has_one = array(
            "ProfileImage"  => "Image",
            "AboutPage"     => "AboutPage"
    );

    function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeByName("TeamHolderPageID");
        $fields->removeByName("SortOrder");
        $fields->addFieldToTab('Root.Main',new TextField('Name',"Name"));
        $fields->addFieldToTab('Root.Main',new TextField('Position',"Position"));
        $fields->addFieldToTab('Root.Main',new TextAreaField('AboutMe',"About Me"));
        $fields->addFieldToTab('Root.Main',new TextField('Email', 'Email Address'));
        $fields->addFieldToTab('Root.Main',new TextField('Mobile'));
        $fields->addFieldToTab('Root.Main',new TextField('LinkedIn'));
        $fields->addFieldToTab('Root.Main',  $uploadField = new UploadField($name = 'ProfileImage',$title = 'Upload a Photo'));
        $uploadField->setFolderName('ProfileImages');
        $uploadField->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif')); 
        return $fields;
    }

}