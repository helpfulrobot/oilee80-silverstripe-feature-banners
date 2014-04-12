<section class="feature-banners item-group">
	<ul>
		<% loop FeatureBanners %>
			<li class="feature-banner item <% if Image %>has-image<% end_if %>">
				<article>
					<% if Image %>
						$Image.CroppedImage(300,300)
					<% end_if %>
					<h1>$Title</h1>
				</article>
			</li>
		<% end_loop %>
	</ul>
</section>