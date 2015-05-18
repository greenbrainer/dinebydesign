<section class="intro jsIntroContainer">
   <div class="backgroundVideo"><img src="$themeDir/images/bg_video.jpg" alt=""></div>
   <div class="videoContainer jsIntroVideoContainer">
      <video class="jsIntroVideo" autoplay loop>
         <source src="$themeDir/video/home_video.mp4" type="video/mp4" media="all and (min-width: 750px)" />
         <source src="$themeDir/video/home_video.webm" type="video/webm" media="all and (min-width: 750px)" />
      </video>
   </div>
   
   <div class="content">
      <h1>$BannerHeadingLine1<br>$BannerHeadingLine2</h1>
      <p>$BannerSubTextLine1<br>$BannerSubTextLine2</p>
      <a href="$BannerLinkTarget.Link" class="button buttonWhite">More</a>
   </div>

   <div class="scrollDown">
      Scroll down
      <a href="#" class="scroll jsIntroScroll"><span></span></a>
   </div>

   <div class="videoControl">
      <a href="#" class="pause jsIntroControl"></a>
   </div>
</section>

<div class="violetBg">
   <div class="wrapper1220 clearfix">
      <section class="group clearfix">
         <div class="whiteBox servicesBox">
            <h2>$HeadingTwo</h2>
            <div class="tabs">
               <div class="tabsLine"><div class="belt jsTabsBelt"></div></div>
               
               <div class="tabsHeader clearfix">
                  <div class="tabsHeaderContent jsTabsHeaderContent">
                     <% loop CoreTabs %>
                         <a href="#" class="tab jsTabsButton <% if First %>active<% end_if %>" data-tab-id="$ID">
                           $Title
                        </a>
                     <% end_loop %>
                  </div>
               </div>

               <div class="tabsArrows jsTabArrows">
                  <div class="tabsArrowLeft"></div>
                  <div class="tabsArrowRight"></div>
               </div>

               <div class="tabsContent">
                  <% loop CoreTabs %>
                     <div class="content jsTabsContent <% if First %>active<% end_if %>" data-tab-id="$ID">
                        <p>
                           $Content.Summary
                        </p>
                        <a href="$CTALink" class="button buttonViolet">more</a>
                     </div>
                  <% end_loop %>
               </div>
            </div>
         </div>
         <div class="orangeBox twitterBox">
            <h2 class="clearfix">Last tweet<span class="twitterIcon"><img src="$themeDir/images/social/twitter.svg" alt="" class="svg"></span></h2>
            <div class="line"></div>
            <div class="items">
               <div class="jsSliderTwitter">
                  <% loop LatestTweets(5) %>
                     <div class="item">
                        <div class="date">$TimeAgo</div>
                        <div class="author">$User</div>
                        <div class="content">
                           $Content
                        </div>
                     </div>
                  <% end_loop %>
               </div>
            </div>
         </div>
      </section>

      <section class="slider">
         <div class="jsSliderContainer">
            <% loop HomepageCtaSliders %>
               <div class="slide">
                  <img src="$Image.CroppedImage(610,320).URL" alt="">
                  <div class="content">
                     <h2>$Title</h2>
                     <p>$Content.Summary</p>
                     <a href="$CTALink" class="button buttonWhite">More</a>
                  </div>
               </div>
            <% end_loop %>
         </div>
      </section>

      <section class="group clearfix"> 
        <div class="orangeBox newsletterBox">
            <h2>newsletter</h2>
            <div class="newsletter">
               $MailChimpForm(NEWSLETTER)
            </div>
            <h2>online brochure</h2>
            <div class="brochure clearfix">
               <ul>
                  <li><a href="$SiteConfig.BrochurePDF.URL"><img src="$themeDir/images/newsletter_eye.svg" alt="" class="svg"><span>view online</span></a></li>
                  <li><a href="$SiteConfig.BrochurePDF.URL" download><img src="$themeDir/images/newsletter_docs.svg" alt="" class="svg"><span>download .pdf</span></a></li>
               </ul>
            </div>
         </div>




         <div class="whiteBox designedBox">
            <div class="content">
               <div class="quote"></div>
               <h3>$CTABlockTitle</h3>
               <h4>$CTABlockSubHeading</h4>
               <p>$CTABlockContent</p>
               <a href="$CTABlockTarget.Link" class="button buttonViolet">$CTABlockLinkText</a>
            </div>
         </div>
      </section>

      <% include StatisticsBoxes %>
   </div>
</div>