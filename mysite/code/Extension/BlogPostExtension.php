<?php 
class BlogPostExtension extends DataExtension {
     
    private static $db = array(
        "Pinned"    => 'Boolean',
        'Author'    => 'Varchar(255)',
        'Excerpt'   => 'Varchar(255)'
    );

    private static $has_one = array(
    );
 
    public function updateCMSFields(FieldList $fields) {
        $fields->addFieldToTab("Root.Main", new CheckboxField("Pinned", "Pin this post to the top of the blog page."));
        $fields->addFieldToTab("Root.Main", new TextField("Author"));
        $fields->addFieldToTab("Root.Main", new TextField("Excerpt"), "Content");
    }

    public function getShortURL() {
        return GoogleUrlApi::shorten($this->owner->AbsoluteLink());
    }
}

/**
 * Represents the extension for the blog post to enable contact form
 * 
 * @author Julius Caamic <julius@greenbrainer.com>
 * @copyright (c) Copyright 2015, Julius Caamic
 */
class BlogPost_Controller_Extension extends Extension {

}