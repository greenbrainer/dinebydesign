<div class="orangeBox contactForm" style="padding-top:0; padding-bottom:20px;">
	<% if Success %>
	    <div style="color: #3c763d; background: #dff0d8; border-color: #d6e9c6; padding:15px; border-radius:4px;">$ThankyouMessage</div>
	<% else %>
	    <h2>//Fill in the form</h2>
	    <h3>and we will call you back</h3>
	    <div class="contact" style="margin-bottom:0;">
	        $ContactForm
	    </div>
	<% end_if %>
</div>