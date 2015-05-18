<nav class="menu">
  <ul>
  	<% loop $Menu(1) %>
     	<li>
     		<% if Children && ClassName!="CaseStudiesHolderPage" %>
     			<a href="$Link" class="jsMenuOpen">$MenuTitle.XML <span class="more"></span></a>
     			<ul class="submenu clearfix">
     				<% loop Children %>
     					<li>
							<a href="$Link">$MenuTitle.XML</a>
                            <% if $Children %>
							<ul>
                                <% loop $Children %>
								    <li><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
                                <% end_loop %>
							</ul>
                            <% end_if %>
						</li>
     				<% end_loop %>
		        </ul>
     		<% else %>
     			<a href="$Link">$MenuTitle.XML</a>
     		<% end_if %>
     	</li>
     <% end_loop %>
  </ul>
</nav>