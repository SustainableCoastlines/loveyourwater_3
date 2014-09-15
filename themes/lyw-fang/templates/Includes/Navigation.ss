<nav class="primary">
	<span class="nav-open-button">²</span>
	<ul>
		<% loop $Menu(1) %>
                <li class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML<br/><span class="nav-subtitle">$Subtitle.XML</span></a></li>
                <% end_loop %>
	</ul>
</nav>
