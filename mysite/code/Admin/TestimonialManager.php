<?php
class TestimonialManager extends ModelAdmin {
    private static $managed_models = array('Testimonial'); // Can manage multiple models

    private static $url_segment = 'Testimonial'; // Linked as /admin/products/

    private static $menu_title = 'Testimonials';

    private static $menu_priority = 8;

    /**
    * Remove the import field
    * 
    * @var array
    */
    public static $model_importers = array();

    //private static $menu_icon = 'mysite/adminimages/contacts.png'; 

}