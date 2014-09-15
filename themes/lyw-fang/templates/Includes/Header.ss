<header class="header" role="banner">
    <div class="header-content-top">
        <div class="inner">
            <div class="unit size4of4 lastUnit">
                <div class='header-counter'>
                    <ul>
                        <li><span class='counter-number'>106</span><br/>Events</li>
                        <li><span class='counter-number'>9062</span><br/>Event participants</li>
                        <li><span class='counter-number'>12050</span><br/>Trees planted</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-content-bottom">
        <div class='inner'>
            <div class="lyw-logo unit size1of4">
                <a href="$BaseHref" rel="home"><img src='$ThemeDir/images/lyw/lyw-logo.png'></a>
            </div>
            <div class="unit size3of4 lastUnit">
                <div class="navigation-bar">
                    <% include Navigation %>
                </div>
                <% if $SearchForm %>
                <span class="search-dropdown-icon">L</span>
                <div class="search-bar">
                    $SearchForm
                </div>
                <% end_if %>
            </div>
        </div>
    </div>
</header>
