<header>
     <div class="wrapper1140 clearfix">
        <div class="headerTop clearfix">
           <div class="logo">
              <a href="/" rel="home">Dine By Design</a>
           </div>
           <div class="mobileMenuButton jsResponsiveMenuButton"></div>
           <div class="rightHeader clearfix">
              <div class="social">
                 <ul>
                 	<% if SiteConfig.LinkedInLink %>
                    	<li><a href="$SiteConfig.LinkedInLink" rel="nofollow"><img src="$themeDir/images/social/linkedin.svg" alt="" class="svg"></a></li>
                    <% end_if %>
                    <% if SiteConfig.TwitterLink %>
                    <li><a href="$SiteConfig.TwitterLink" rel="nofollow"><img src="$themeDir/images/social/twitter.svg" alt="" class="svg"></a></li>
                   	<% end_if %>
                    <% if SiteConfig.GooglePlusLink %>
                    <li><a href="$SiteConfig.GooglePlusLink" rel="nofollow"><img src="$themeDir/images/social/googleplus.svg" alt="" class="svg"></a></li>
                   	<% end_if %>
                 </ul>
              </div>
              <div class="search jsResponsiveMenuContainer">
                 <form action="/home/SearchForm" method="get">
                    <input type="text" name="Search" placeholder="search" required>
                    <input type="submit" name="search" value="">
                 </form>
              </div>
              <div class="request">
                 <a href="/contact">Request call back</a>
              </div>
           </div>
        </div>

        <div class="headerBottom clearfix jsResponsiveMenuContainer">
           <% include Navigation %>
           <div class="call">
              <div class="content">Call us! $SiteConfig.PhoneNumber</div> <img src="$themeDir/images/phone.svg" alt="" class="phoneIcon">
           </div>
        </div>
     </div>
     <div class="headerBg"></div>
  </header>