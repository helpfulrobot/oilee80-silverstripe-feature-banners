<section class="feature-banners">
	<ul class="item-group">
		<% loop FeatureBanners %>
			<li class="feature-banner item $FirstLast
				<% if CssClass.exists %>$CssClass.Implode(" ")<% end_if %>
				<% if Image %>has-image<% end_if %>
				<% if First %>active<% end_if %>
				<% if PrimaryLink && PrimaryLinkText%>has-primary-link<% end_if %>
				<% if SecondaryLink && SecondaryLinkText%>has-secondary-link<% end_if %>
				<% if Description %>has-description<% end_if %>"
				<% if Image %>style="background-image:url('{$Image.CroppedImage(985,250).URL}')"<% end_if %>>
				<article>
					<h1>
						<% if PrimaryLink %>
							<a href="$PrimaryLink.Link" title="$PrimaryLink.MenuTitle">
						<% end_if %>
						$Title
						<% if PrimaryLink %>
							</a>
						<% end_if %>
						</h1>
					<% if Description %>
						<div class="description">$Description</div>
					<% end_if %>
					<footer>
						<% if PrimaryLink && PrimaryLinkText %>
							<a class="button primary-link" href="$PrimaryLink.Link" title="$PrimaryLink.MenuTitle">$PrimaryLinkText</a>
						<% end_if %>

						<% if SecondaryLink && SecondaryLinkText %>
							<a class="button secondary-link" href="$SecondaryLink.Link" title="$SecondaryLink.MenuTitle">$SecondaryLinkText</a>
						<% end_if %>
					</footer>
				</article>
			</li>
		<% end_loop %>
	</ul>
</section>