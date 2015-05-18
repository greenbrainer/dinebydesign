<?php
class ServicesHolderPage extends Page {

	private static $db = array(
	);

	private static $has_one = array(
	);

	private static $has_many = array(
		// "ServicesPage"			=> "ServicesPage"
	);

	private static $allowed_children = array(
		"ServicesPage"
	);

}
class ServicesHolderPage_Controller extends Page_Controller {

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();
	}
}
