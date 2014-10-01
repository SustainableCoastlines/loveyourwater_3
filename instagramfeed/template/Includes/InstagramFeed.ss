<div id="InstagramFeedHolder">
	<div class="customNavigation">
		<%--<a class="btn prev"><img src="$ThemeDir/img/left-arrow.png"></a>--%>
	</div>
	<div class="SmallerFit">
		<div id="owl-demo" class="owl-carousel owl-theme">
			<% loop $Me %>
				<div class="item"><img src="$StandardResImage"></div>
			<% end_loop %>
		</div>
	</div>
	<div class="customNavigation">
		<%--<a class="btn next"><img src="$ThemeDir/img/right-arrow.png"></a>--%>
	</div>
</div>