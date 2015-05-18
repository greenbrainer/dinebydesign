<?php
/**
 * Represents the brochure form that handles sending brochure to the email address, alert admin by email
 * and send to mailing list
 * 
 * @author Julius Caamic <julius@greenbrainer.com>
 * @copyright (c) Copyright 2015, Julius Caamic
 */
class BrochureForm extends MailChimpForm {

	public function __construct($controller, $name) {
		$fields = new FieldList(
			TextField::create('Name', 'Name')->setAttribute('required', 'required')->setAttribute('placeholder', 'Your Name')->addExtraClass('form-control')
		);

		Requirements::customCSS(<<<CSS
			form#BrochureForm_BrochureForm fieldset legend {margin-bottom:5px; font-weight:bold;}
			p#BrochureForm_BrochureForm_error {margin-bottom:0;}
			form#BrochureForm_BrochureForm .bad {
			    background: none repeat scroll 0 0 #f2dede;
			    border-color: #ebccd1;
			    border-radius: 4px;
			    color: #a94442;
			    padding: 15px;	
			}
			form#BrochureForm_BrochureForm .good {
				background: none repeat scroll 0 0 #dff0d8;
			    border: 1px solid #d6e9c6;
			    border-radius: 4px;
			    color: #3c763d;
			    padding: 15px;	
			}
CSS
		);

		Requirements::customScript(<<<JS
			(function($) {
			    $(document).ready(function(){
					$('form#BrochureForm_BrochureForm').submit(function(e){

						var postData = $(this).serializeArray();
						var formURL = $(this).attr('action');
						var obj = $(this);

						obj.find('input[type="submit"]').val('Sending please wait ...');

						$.ajax({
							url: formURL,
							type: 'POST',
							data: postData,
							dataType: 'JSON',
							success: function(data) {
								if (data.success) {
									obj.find('p#BrochureForm_BrochureForm_error').removeClass('bad').addClass('good').text(data.message).show();
								} else {
									obj.find('p#BrochureForm_BrochureForm_error').removeClass('good').addClass('bad').text(data.message).show();
								}

								obj.find('input[type="submit"]').val('Subscribe');
								obj.trigger('reset');
							}
						});

						e.preventDefault();
					});
			    });
			})(jQuery);
JS
		);

		parent::__construct($controller, $name, $fields, 'BROCHURE');
	}

	/**
	 * Subscribe the customer to the mailing list and send the brochure to the email address
	 * 
	 * @param  Array  $data
	 * @param  Form   $form
	 */
	public function subscribe(Array $data, Form $form) {
		$result = $this->saveToMailingList($data);

		$this->emailBrochure($data);
		$this->emailAdmin($data);

		if (Director::is_ajax()) {
			return json_encode(array('success' => true, 'message' => 'We have sent a copy of the brochure to your email address.'));
		} else {
			$this->sessionMessage('We have sent a copy of the brochure to your email address.', 'good');
			Controller::curr()->redirectBack();
		}
	}

	/**
	 * Save to mailing list
	 * 
	 * @param  array $data
	 * @return array
	 */
	private function saveToMailingList($data) {
		$MailChimp = new \Drewm\MailChimp(SiteConfig::current_site_config()->APIKey);
		
		$apiData = array(
			'id'                => SiteConfig::current_site_config()->MailChimpList()->filter(array('Code' => $data['ListCode']))->First()->ListID,
			'email'             => array('email' => $data['Email']),
			'merge_vars'        => array('Name' => $data['Name']),
			'double_optin'      => false,
			'update_existing'   => false,
			'replace_interests' => false,
			'send_welcome'      => false,
		);

		return $MailChimp->call('lists/subscribe', $apiData);
	}

	/**
	 * Send brochure to customer email
	 * 
	 * @param  array $data
	 */
	private function emailBrochure(Array $data) {
		$email = new Email(
			'no-reply@dinebydesign.co.uk', 
			$data['Email'], 
			'DineByDesign Brochure',
			'Hi ' .$data['Name']. ',<br><br>You opted to receive a copy of our brochure by email. Please find the attached file.<br><br>Kind Regards,<br>DineByDesign'			
		);

		$email->attachFile(SiteConfig::current_site_config()->BrochurePDF()->Filename);

		$email->send();
	}

	/**
	 * Notify admin 
	 * 
	 * @param  Array  $data
	 */
	private function emailAdmin(Array $data) {
		$email = new Email(
			'no-reply@dinebydesign.co.uk', 
			SiteConfig::current_site_config()->Email,  
			'A customer opt in to receive a copy of brochure by email', 
			'Hi Sales,<br><br>' .$data['Name']. ' has requested to receive a copy of our brochure by email.<br><br>Please see customer details below:<br><br>Name: ' .$data['Name']. '<br>Email: ' .$data['Email']. '<br><br>Kind Regards,<br>DineByDesign'
		);

		$email->send();
	}
}