<section class="group clearfix">
	<% loop StatisticsBoxes.Limit(4).Sort(SortOrder) %>
		<div class="statisticsBox money statbox-$ID">
			<div class="icon"><img src="$Image.URL" alt="" class="svg"></div>
			<div class="counter jsOdometer">$formatTitleForOdometer</div>
			<p>$Content</p>
		</div>
	<% end_loop %>
</section>