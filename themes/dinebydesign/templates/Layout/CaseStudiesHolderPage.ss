<div class="violetBg">
   <div class="wrapper1140">
      <section class="information">
         <h1>$Title</h1>
         <div class="excerpt">$SubHeadingLineOne</div>
         <p>$SubHeadingLineTwo</p>
      </section>
   </div>
</div>

<div class="grayBg">
   <div class="bgWrapper"></div>
   <div class="caseStudiesVioletBg"></div>
   <div class="wrapper1220">
      <section class="caseStudiesBoxesWrapper clearfix">
      <% loop Children %>
         <% if ClassName=CaseStudyPage %>
            <div class="caseStudyBox">
               <div class="image">
                  <a href="$Link"><img src="$CaseStudyImage.URL" alt=""></a>
               </div>
               <div class="content">
                  <h3><a href="$Link">$Title</a></h3>
                  <p>$Excerpt</p>
                  <div class="date">Date: {$Created.DayOfMonth}.{$Created.format(m)}.{$Created.Year}
                  <!-- 20.12.2005 -->
                  </div>
               </div>
            </div>
         <% end_if %>
      <% end_loop %>
      </section>
   </div>
</div>