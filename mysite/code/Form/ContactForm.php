<?php
/**
 * Represents the contact form
 * 
 * @author Julius Caamic <julius@greenbrainer.com> 
 * @copyright (c) 2015, Julius Camic
 */
class ContactForm extends Form {

	/**
	 * Creates the contact form
	 * 
	 * @param Controller $controller
	 * @param String $name
	 */
	public function __construct($controller, $name) {
		$fields = new FieldList(
			TextField::create('Name', 'Name')->setAttribute('placeholder', 'Name'),
			EmailField::create('Email', 'Email')->setAttribute('placeholder', 'Email'),
			TextField::create('Phone', 'Phone')->setAttribute('placeholder', 'Phone'),
			TextField::create('CallBack', 'Call back when')->setAttribute('placeholder', 'Call Back When'),
			TextField::create('Subject', 'Subject')->setAttribute('placeholder', 'Subject'),
			TextareaField::create('Message', 'Message')->setAttribute('placeholder', 'Message')
		);

		$actions = new FieldList(
			FormAction::create('doSend')->setTitle('Send Message')
		);

		$validator = new RequiredFields('Name', 'Email', 'Phone', 'CallBack', 'Subject', 'Message');

		Requirements::customScript(<<<JS
			(function($) {
			    $(document).ready(function(){
			        $('form#ContactForm_ContactForm').submit(function(e){
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
		    						obj.find('p#ContactForm_ContactForm_error').removeClass('bad').addClass('good').text(data.message).show();
		    					}

		    					obj.find('input[type="submit"]').val('Send Message');

		    					obj.trigger('reset');

		    					$('html, body').animate({
		    						scrollTop: $('div.sidebar').offset().top
		    					}, 1000)
		    				}
		    			});

			        	e.preventDefault();
			        });
			    })
			})(jQuery);
JS
		);

		parent::__construct($controller, $name, $fields, $actions, $validator);		
	}

	/**
	 * Send email
	 * 
	 * @param  $data
	 * @param  Form   $form
	 * @return Controller
	 */
	public function doSend($data, Form $form) {
		$contactPage = ContactPage::get()->First();
		
		$this->createSubmission($data, $contactPage);

		$this->sendEmail($data, $contactPage);

		if (Director::is_ajax()) {
			return json_encode(array('success' => true, 'message' => $contactPage->ThankyouMessage));
		} else {
			$this->controller->redirect($this->controller->Link("?success=1"));
		}
	}

	/**
	 * Create submission record
	 * 
	 * @param  $data
	 */
	private function createSubmission($data, $contactPage){
        $submission = new Submission();
        $submission->Name			= $data["Name"];
		$submission->Email			= $data["Email"];
		$submission->Phone			= $data["Phone"];
		$submission->CallBackTime	= $data["CallBack"];
		$submission->Subject		= $data["Subject"];
		$submission->Message		= $data["Message"];
		$submission->ContactPageID	= $contactPage->ID;
        $submission->write();

        return true;
	}

	/**
	 * Send email to receipients (trainer & admin)
	 */
	private function sendEmail($data, $contactPage) {
        $emailString = "<table cellspacing=\"10\">";

        foreach($data as $key => $value){

            if ($key != "url" && $key != "SecurityID" && $key != "SubmitForm" && $key != 'action_doSend'){
                if (is_array($value)){
                    if ($key == "Products"){
                        $valueArray = array();
                        foreach($value as $prodID => $quantity){
                            if ($quantity == 0){
                                continue;
                            }
                            $product = DataObject::get_one("Product", "ID=" . $prodID);
                            foreach($product as $p){

                            }
                            $valueArray[] = '<td>' . $quantity . '</td><td>' . $product->Title . '</td>';
                        }
                        $value = "<table cellspacing='5px'><tr>" . implode("</tr><tr>", $valueArray) . '</tr></table>';
                    } else {
                        $value = implode(', ', $value);
                    }
                }

                $emailString .= "<tr><td><b>" . $key . "</b></td><td>" . $value . "</td></tr>";
            }
        }

        $emailString .= "</table>";

        $emaildata = array('content' => $emailString, 'title' => $contactPage->Subject);

        $Subject = $contactPage->Subject; 
        $From = "noreply@ignitept.co.uk";
        
        $recipientArray = array();
        foreach($contactPage->Recipients() as $recipient){
        	$recipientArray[] = $recipient->Email;
        }

        $To = implode(',', $recipientArray);
        $email = new Email($From, $To, $Subject);
        $email->setTemplate('contactRequest');
        $email->populateTemplate($emaildata);
        $email->send();		
	}
}