<?php 
class BlogExtension extends DataExtension {
     
    private static $db = array(
    );

    private static $has_one = array(
    );
 
    // public function updateCMSFields(FieldList $fields) {
    //     $fields->addFieldToTab("Root.Main", new CheckboxField("Pinned", "Pin this post to the top of the blog page."));
    //     $fields->addFieldToTab("Root.Main", new TextField("Author"));
    // }

    public function PinnedPaginatedList($pinned = 0) {
        $posts = new PaginatedList(DataObject::get("BlogPost")->where("Pinned ='" . $pinned . "'"));

        // If pagination is set to '0' then no pagination will be shown.
        if($this->PostsPerPage > 0) $posts->setPageLength($this->PostsPerPage);
        else $posts->setPageLength($this->getBlogPosts()->count());

        $start = $this->request->getVar($posts->getPaginationGetVar());
        $posts->setPageStart($start);

        return $posts;
    }
}

class Blog_Controller_Extension extends Extension {
   
}