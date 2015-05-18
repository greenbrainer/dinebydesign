<div class="violetBg">
   <div class="wrapper1140">
      <section class="information">
         <h1>$Title</h1>
         <% if $Query %>
            <p class="excerpt">You searched for &quot;{$Query}&quot;</p>
        <% end_if %>
      </section>
   </div>
</div>

<div class="rightGrayBg">
   <div class="bgWrapper"></div>
   <div class="wrapper1220 clearfix">
      <div class="mainImage">
         <img src="$Image.URL" alt="">
      </div>
      
      <div class="clearfix">
         <section class="contentSide">
             <% if $Results %>
                <section class="caseStudiesBoxesWrapper clearfix">
                    <% loop $Results %>
                    <div class="caseStudyBox">
                       <div class="image">
                          <a href="$Link">
                            <% if ClassName = AboutPage %>
                                <img src="$HeaderImage.CroppedImage(355,332).URL" alt=""></a>
                            <% else_if ClassName = CaseStudyPage %>
                                <img src="$CaseStudyImage.CroppedImage(355,332).URL" alt=""></a>
                            <% else_if ClassName = ServicesPage %>
                                <img src="$Image.CroppedImage(355,332).URL" alt=""></a>
                            <% else %>
                                <img src="$themeDir/images/logo.png" alt=""></a>
                            <% end_if %>
                       </div>
                       <div class="content">
                          <h3><a href="$Link">$Title</a></h3>
                          <p>$Excerpt</p>
                          <div class="date">Date: {$Created.DayOfMonth}.{$Created.format(m)}.{$Created.Year}
                          <!-- 20.12.2005 -->
                          </div>
                       </div>
                    </div>
                    <!-- <li>
                        <h4>
                            <a href="$Link">
                                <% if $MenuTitle %>
                                $MenuTitle
                                <% else %>
                                $Title
                                <% end_if %>
                            </a>
                        </h4>
                        <% if $Content %>
                            <p>$Content.LimitWordCountXML</p>
                        <% end_if %>
                        <a class="readMoreLink" href="$Link" title="Read more about &quot;{$Title}&quot;">Read more about &quot;{$Title}&quot;...</a>
                    </li> -->
                    <% end_loop %>
                </section>
                <% else %>
                <p>Sorry, your search query did not return any results.</p>
            <% end_if %>

                <% if $Results.MoreThanOnePage %>
                    <div id="PageNumbers">
                        <div class="pagination">
                            <% if $Results.NotFirstPage %>
                                <a class="prev" href="$Results.PrevLink" title="View the previous page">&larr;</a>
                            <% end_if %>
                            <span>
                                <% loop $Results.Pages %>
                                    <% if $CurrentBool %>
                                    $PageNum
                                    <% else %>
                                    <a href="$Link" title="View page number $PageNum" class="go-to-page">$PageNum</a>
                                    <% end_if %>
                                <% end_loop %>
                            </span>
                            <% if $Results.NotLastPage %>
                                <a class="next" href="$Results.NextLink" title="View the next page">&rarr;</a>
                            <% end_if %>
                        </div>
                        <p>Page $Results.CurrentPage of $Results.TotalPages</p>
                    </div>
                <% end_if %>


         </section>
         <div class="sidebar">
            <% include NewsletterForm %>
            <% include CallbackRequest %>
         </div>
      </div>
   </div>
</div>