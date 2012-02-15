<div id="partner-footer">
	<h3>Partners</h3>
		<% control FooterPartners %>
			<% if InFooter %>
				<% if Logo %>
					<a href='$Link' style='display:inline-block; float:left; margin: 0 7px' rel="external">
						$Logo.SetHeight(40)
						<br /><span style='font-size: 10px;color:#333;'>$Type</span>
					</a>
				<% end_if %>
			<% end_if %>
		<% end_control %>
</div>