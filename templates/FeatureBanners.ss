<section class="feature-banners">
	<ul class="item-group">
		<% loop FeatureBanners %>
			<li class="feature-banner item <% if Image %>has-image<% end_if %> <% if First %>active<% end_if %> $FirstLast">
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