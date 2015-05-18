<div class="violetBg">
   <div class="wrapper1140">
      <section class="information bottomMinus">
         <h1>$Title</h1>
      </section>
   </div>
</div>

<div class="rightGrayBg">
   <div class="bgWrapper"></div>
   <div class="wrapper1220 clearfix">
      <% loop getLatestBlogPost %>
         <article class="articleBox mainArticleBox">
            <img src="$FeaturedImage.CroppedImage(1200, 400).Link" class="image">
            <div class="content">
               <div class="meta">Writen by $Author $PublishDate.Ago in <% loop Categories %><a href="$Link">$Title</a><% end_loop %></div>
               <h3><a href="$Link">$Title</a></h3>
               <p>$Content.Summary</p>
            </div>
         </article>
      <% end_loop %>
      <div class="clearfix">
         <section class="blog">
            <% loop PaginatedList(0) %>
               <article class="articleBox" style="background: none repeat scroll 0 0 #f2f2f2; padding: 20px;">
                  
                  <% if $FeaturedImage %>
                     <img src="$FeaturedImage.CroppedImage(725, 225).Link" class="image">
                  <% end_if %>

                  <div class="" style="color: #686a71;">
                     <div class="meta" style="margin-top: 20px;">Writen by $Author $PublishDate.Ago in <% loop Categories %><a href="$Link" style="color:#764C7F;">$Title</a><% end_loop %></div>
                     <h3 style="margin: 20px 0 20px 0;"><a href="$Link" style="color: #764c7f; font-family: 'Blender Pro Heavy'; font-size: 35px;">$Title</a></h3>
                     <p>$Content.Summary</p>
                  </div>
               </article>
            <% end_loop %>
            <% if PaginatedList.MoreThanOnePage %>
               <div class="pagination">
                  <ul>
                     <% if PaginatedList.PrevLink %>
                     <li class="previous"><a href="$PaginatedList.PrevLink"></a></li>
                     <% end_if %>
                     <% loop $PaginatedList.Pages %>
                        <% if $CurrentBool %>
                           <li class="active">
                              <a href="#" title="">
                                 $PageNum
                              </a>
                           </li>
                        <% else %>
                           <li>
                              <a href="$Link" title="">
                                 $PageNum
                              </a>
                           </li>
                        <% end_if %>
                     <% end_loop %>
                     <% if PaginatedList.NextLink %>
                     <li class="next"><a href="$PaginatedList.NextLink"></a></li>
                     <% end_if %>
                  </ul>
               </div>
            <% end_if %>
         </section>

         <div class="sidebar">
            <div class="categoriesBox">
               <h2>categories</h2>
               <ul>
                  <% loop Categories %>
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