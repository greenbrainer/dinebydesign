<?php
class ProductPage extends Page {

	private static $db = array(
	);

	private static $has_one = array(
	);

	private static $has_many = array(
		"Products"	=> "Product"
	);

}
class ProductPage_Controller extends Page_Controller {

	public function init() {
		parent::init();
	}
}
