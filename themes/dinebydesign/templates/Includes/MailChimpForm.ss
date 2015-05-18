<form $FormAttributes>
	<% if $Message %>
		<p id="{$FormName}_error" class="message $MessageType">$Message</p>
	<% else %>
		<p id="{$FormName}_error" class="message $MessageType" style="display: none"></p>
	<% end_if %>
     
	<fieldset>
		<div id="Email" class="field email">
			$Fields.dataFieldByName(Email)
			<span id="{$FormName}_error" class="message $Fields.dataFieldByName(Email).MessageType">
				$Fields.dataFieldByName(Email).Message
			</span>
		</div>		

		$Fields.dataFieldByName(ListCode)
		$Fields.dataFieldByName(SecurityID)

		<% if $Actions %>
		<div class="Actions">
			<% loop $Actions %>$Field<% end_loop %>
		</div>
		<% end_if %>
	</fieldset>
</form>