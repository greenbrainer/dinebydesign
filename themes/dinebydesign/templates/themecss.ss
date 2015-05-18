
<% loop StatisticsBoxes %>
	<% if BackgroundImage %>
		.statbox-$ID:hover{background-image:url($BackgroundImage.URL) !important}
	<% end_if %>	
<% end_loop %>