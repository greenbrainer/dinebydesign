      <footer>
         <div class="wrapper1140 clearfix">
            <div class="menus clearfix">
               <ul>
                  <li><a href="/about-us" class="big"><span>about us</span></a></li>
                  <li><a href="/case-studies" class="big"><span>case studies</span></a></li>
                  <li><a href="/blog" class="big"><span>blog</span></a></li>
                  <li><a href="/contact" class="big"><span>contact</span></a></li>
               </ul>
               <ul>
                  <li><a href="/what-we-do" class="big"><span>services</span></a></li>
                     <% loop getServicesPages.limit(4) %>
                        <li><a href="$Link"><span>$MenuTitle.XML</span></a></li>
                     <% end_loop %>
               </ul>
               <ul>
                  <li><a href="/terms" class="big"><span>terms of use</span></a></li>
                  <li><a href="privacy" class="big"><span>privacy policy</span></a></li>
                  <li><a href="cookies" class="big"><span>cookies</span></a></li>
               </ul>
            </div>
            <div class="contact">
               <div class="telephone">
                  telephone: <a href="tel:$SiteConfig.PhoneNumber">$SiteConfig.PhoneNumber</a>
               </div>
               <div class="email">
                  email: <a href="mailto:$SiteConfig.Email">$SiteConfig.Email</a>
               </div>
               <div class="phoneIcon"><img src="$themeDir/images/phone.svg" alt="" class="svg"></div>
            </div>
         </div>
         <div class="copyright">
            <div class="wrapper1140 clearfix">
            <div class="footerleft">
               &copy; $Year All rights reserved Dine by Design
               </div>
               <div class="footerright">
               <a href="http://www.newedge.co.uk">Web Design Northampton</a> by New Edge
               </div>
            </div>

         </div>
      </footer>