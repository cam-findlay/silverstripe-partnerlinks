<div class="typography">
	<% if Menu(2) %>
		<% include SideBar %>
		<div id="Content">
	<% end_if %>

	<% if Level(2) %>
	  	<% include BreadCrumbs %>
	<% end_if %>
	
		<h2>$Title</h2>
	
		$Content
		
<% if PublishedPartners %>
	<% control PublishedPartners %>
		<div class="partner">
			
				<a href='$Link' target="_blank">$Logo.SetWidth(100)</a>
				<h2>$Title - <span>$Type</span></h2>
				$Content
		
		</div>
	<% end_control %>
<% end_if %>
		
		
		
	<% if Menu(2) %>
		</div>
	<% end_if %>
</div>