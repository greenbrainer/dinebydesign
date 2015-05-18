<?php 
class CustomSiteConfig extends DataExtension {
     
    private static $db = array(
        "MailChimpFormID"               => "Varchar",
        "MailchimpUserID"               => 'Varchar',
        'MailchimpFormAction'           => 'Varchar(255)',
        "GooglePlusLink"                => 'Varchar',
        "TwitterLink"                   => 'Varchar',
        "TwitterUser"                   => 'Varchar',
        "LinkedInLink"                  => 'Varchar',
        "SoundCloudLink"                => 'Varchar',
        "InstagramLink"                 => 'Varchar',
        "AddressLine1"                  => 'Varchar',
        "AddressLine2"                  => 'Varchar',
        "Town"                          => 'Varchar',
        "County"                        => 'Varchar',
        "PostCode"                      => 'Varchar',
        "PhoneNumber"                   => 'Varchar',
        "Email"                         => 'Varchar',
        "AboutText"                     => 'Text',
        "FooterLinks"                   => "HTMLText",
        "HeadOfficeAddressLine1"        => 'Varchar',
        "HeadOfficeAddressLine2"        => 'Varchar',
        "HeadOfficeTown"                => 'Varchar',
        "HeadOfficeCounty"              => 'Varchar',
        "HeadOfficePostCode"            => 'Varchar',
        "HeadOfficePhoneNumber"         => 'Varchar',
        "HeadOfficeEmail"               => 'Varchar',
        "SharingToolID"                 => 'Varchar',
        'HasSideBar'                    => 'Boolean',
        'ShowTwitter'                   => 'Boolean',
        'ShowLatestBlog'                => 'Boolean',
        'SidebarBlogPosts'              => 'Int',
        'ShowTestimonials'              => 'Boolean',
        'SideBarTestimonials'           => 'Int',
        'ShowSharingTool'               => 'Boolean',
        'DisqusShortName'               => 'Varchar',
        'OnlineBrochureLink'            => 'Varchar',
        'UsePDFOnline'                  => 'Boolean'
    );

private static $has_one = array(
    "BrochurePDF"   => 'File'
);
 
    public function updateCMSFields(FieldList $fields) {
        // $fields->addFieldToTab("Root.Marketting", new TextField("MailChimpFormID", "Mailchimp List ID"));
        // $fields->addFieldToTab("Root.Marketting", new TextField("MailchimpUserID", "Mailchimp User ID"));
        // $fields->addFieldToTab("Root.Mailchimp", new TextField("MailchimpFormAction", "Form action for mailchimp signup"));
        $fields->addFieldToTab("Root.Social", new TextField("GooglePlusLink"));
        $fields->addFieldToTab("Root.Social", new TextField("TwitterLink"));
        $fields->addFieldToTab("Root.Social", new TextField("Twitter User Name"));
        $fields->addFieldToTab("Root.Social", new TextField("LinkedInLink"));
        $fields->addFieldToTab("Root.Social", new TextField("DisqusShortName"));
        // $fields->addFieldToTab("Root.Social", new TextField("SoundCloudLink"));
        // $fields->addFieldToTab("Root.Social", new TextField("InstagramLink"));
        // $fields->addFieldToTab("Root.Social", new TextField("SharingToolID"));
        $fields->addFieldToTab("Root.Contact", new TextField("AddressLine1"));
        $fields->addFieldToTab("Root.Contact", new TextField("AddressLine2"));
        $fields->addFieldToTab("Root.Contact", new TextField("Town"));
        $fields->addFieldToTab("Root.Contact", new TextField("County"));
        $fields->addFieldToTab("Root.Contact", new TextField("PostCode"));
        $fields->addFieldToTab("Root.Contact", new TextField("PhoneNumber"));
        $fields->addFieldToTab("Root.Contact", new TextField("Email"));
        // $fields->addFieldToTab("Root.About", new TextAreaField("AboutText"));
        // $fields->addFieldToTab("Root.Footer", new HTMLEditorField("FooterLinks"));

        $fields->addFieldToTab("Root.HeadOffice", new TextField("HeadOfficeAddressLine1"));
        $fields->addFieldToTab("Root.HeadOffice", new TextField("HeadOfficeAddressLine2"));
        $fields->addFieldToTab("Root.HeadOffice", new TextField("HeadOfficeTown"));
        $fields->addFieldToTab("Root.HeadOffice", new TextField("HeadOfficeCounty"));
        $fields->addFieldToTab("Root.HeadOffice", new TextField("HeadOfficePostCode"));
        $fields->addFieldToTab("Root.HeadOffice", new TextField("HeadOfficePhoneNumber"));
        $fields->addFieldToTab("Root.HeadOffice", new TextField("HeadOfficeEmail"));

        // $fields->addFieldToTab("Root.DefaultSideBar", new CheckboxField("HasSideBar", "Show Sidebar on this page"));
        // $fields->addFieldToTab("Root.DefaultSideBar", $twitterToggle = new CheckboxField("ShowTwitter", "Show Twitter widget"));
        // if (strlen(SiteConfig::current_site_config()->TwitterUser) == 0){
        //     $twitterToggle->setDisabled(true);
        //     $twitterToggle->setTitle("Show Twitter widget (Please enter a Twitter user in settings)");

        // }        
        // $fields->addFieldToTab("Root.DefaultSideBar", new CheckboxField("ShowLatestBlog", "Show latest blog posts"));
        // $fields->addFieldToTab("Root.DefaultSideBar", new NumericField("SidebarBlogPosts", "Number of posts to show"));
        // $fields->addFieldToTab("Root.DefaultSideBar", new CheckboxField("ShowTestimonials", "Show testimonials"));
        // $fields->addFieldToTab("Root.DefaultSideBar", new NumericField("SideBarTestimonials", "Number of testimonials to show"));
        // $fields->addFieldToTab("Root.DefaultSideBar", $sharingToolToggle = new CheckboxField("ShowSharingTool", "Show sharing tool"));
        // if (!SiteConfig::current_site_config()->TwitterUser){
        //     $sharingToolToggle->setDisabled(true);
        //     $sharingToolToggle->setTitle("Show sharing tool (Please enter a sharing tool ID in settings)");
        // }

        $fields->addFieldToTab("Root.Brochure", $pdfField = new UploadField("BrochurePDF"));
        $pdfField->setAllowedExtensions(array('PDF'));
        $fields->addFieldToTab("Root.Brochure", new TextField("OnlineBrochureLink"));
        $fields->addFieldToTab("Root.Brochure", new CheckboxField("UsePDFOnline", "Open Brochure PDF online"));
    }
}