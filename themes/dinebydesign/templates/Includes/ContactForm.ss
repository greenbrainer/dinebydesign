<form $FormAttributes>

	<% if $Message %>
		<p id="{$FormName}_error" class="message $MessageType" style="color: #3c763d; background: #dff0d8; border-color: #d6e9c6; padding:15px; border-radius:4px; margin-bottom:10px;">$Message</p>
	<% else %>
		<p id="{$FormName}_error" class="message $MessageType" style="display: none; color: #3c763d; background: #dff0d8; border-color: #d6e9c6; padding:15px; border-radius:4px; margin-bottom:10px;"></p>
	<% end_if %>

    $Fields.dataFieldByName(Name)
    $Fields.dataFieldByName(Email)
    $Fields.dataFieldByName(Phone)
    $Fields.dataFieldByName(CallBack)
    $Fields.dataFieldByName(Subject)
    $Fields.dataFieldByName(Message)

    $Fields.dataFieldByName(SecurityID)

    <% loop $Actions %>$Field<% end_loop %>

</form>