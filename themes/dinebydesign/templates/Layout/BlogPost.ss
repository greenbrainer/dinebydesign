<div class="violetBg">
    <div class="wrapper1140">
        <section class="information">
            <h1>$Title</h1>

            <div class="excerpt">$Excerpt</div>
            <div class="articleInfo clearfix">
                <div class="meta">
                    Writen by $Author $PublishDate.Ago in <a href="#">Kitchen design</a>
                </div>
                <div class="social">
                    <span>Share on:</span>
                    <a href="http://www.facebook.com/sharer.php?u=$AbsoluteLink" target="_blank" rel="nofollow" class="facebook" title="facebook">
                        <img src="$themeDir/images/social/facebook.svg" alt="" class="svg">facebook
                    </a>

                    <a href="https://twitter.com/share?text=$Title.URLATT&url=$ShortURL.URLATT&counturl=$AbsoluteLink" data-count="none" target="_blank" rel="nofollow" class="twitter" title="twitter">
                        <img src="$themeDir/images/social/twitter.svg" alt="" class="svg">twitter
                    </a>

                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=$AbsoluteLink.URLATT&title=$Title.URLATT&summary=$Content.Summary.URLATT&source=Dine%20By%20Design" target="_blank" rel="nofollow" class="linkedin">
                        <img src="$themeDir/images/social/linkedin.svg" alt="" class="svg">linkedin
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="rightGrayBg">
   <div class="bgWrapper"></div>
   <div class="wrapper1220 clearfix">
      <div class="mainImage">
         <img src="$FeaturedImage.CroppedImage(1200, 400).Link" alt="">
      </div>
      
      <div class="clearfix">
         <section class="contentSide">
            $Content
            <div class="clearfix"></div>
            <div class="comments">
               <h2>comments</h2>
               <div class="disqus">
                  <div id="disqus_thread"></div>
                  <script type="text/javascript">
                      /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                      var disqus_shortname = '$SiteConfig.DisqusShortName';

                      /* * * DON'T EDIT BELOW THIS LINE * * */
                      (function() {
                          var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                          dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                          (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                      })();
                  </script>
               </div>
            </div>
         </section>
         <div class="sidebar">
            <div class="categoriesBox">
               <h2>categories</h2>
               <ul>
                  <% loop Parent.Categories %>
                     <li><a href="$Link">$Title</a></li>
                  <% end_loop %>
               </ul>
            </div>
            <% include NewsletterForm %>
            <% include CallbackRequest %>
            <% include Brochure %>
         </div>
      </div>
   </div>
</div>