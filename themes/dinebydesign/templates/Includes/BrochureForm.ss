<form $FormAttributes>
	<% if $Message %>
		<p id="{$FormName}_error" class="message $MessageType">$Message</p>
	<% else %>
		<p id="{$FormName}_error" class="message $MessageType" style="display: none"></p>
	<% end_if %>
     
	$Fields.dataFieldByName(Name)
	<span id="{$FormName}_error" class="message $Fields.dataFieldByName(Name).MessageType">
		$Fields.dataFieldByName(Name).Message
	</span>
	$Fields.dataFieldByName(Email)
	<span id="{$FormName}_error" class="message $Fields.dataFieldByName(Email).MessageType">
		$Fields.dataFieldByName(Email).Message
	</span>

	$Fields.dataFieldByName(ListCode)
	$Fields.dataFieldByName(SecurityID)

	<% if $Actions %>
		<% loop $Actions %>$Field<% end_loop %>
	<% end_if %>

</form>