<div class="violetBg">
   <div class="wrapper1140">
      <section class="information">
         <h1>$Title</h1>
         <div class="excerpt">$SubHeadingLineOne</div>
         <p>$SubHeadingLineTwo</p>
      </section>
   </div>
</div>

<div class="rightGrayBg">
   <div class="bgWrapper"></div>
   <div class="wrapper1220 clearfix">
      <div class="mainImage">
         <img src="$Image.CroppedImage(1200, 400).Link" alt="">
      </div>
      
      <div class="clearfix">
         <section class="contentSide">
            $Content
         </section>
         <div class="sidebar">
            <% include NewsletterForm %>
            <% include CallbackRequest %>
            <% include Brochure %>
         </div>
      </div>
      <% if CaseStudyPages %>
         <div class="caseStudiesBoxesHeader">
            <h2>case studies</h2>
         </div>
         
         <section class="caseStudiesBoxesWrapper clearfix">
            <% loop CaseStudyPages %>
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
            <% end_loop %>
         </section>
      <% end_if %>
   </div>
</div>
<% if CTABoxTitle %>
   <div class="wrapper1220 clearfix">
      <div class="statisticsBoxesHeader">
         <h2>$CTABoxTitle</h2>
      </div>
      
      <% include CTABox %>
   </div>
<% end_if %>
<% include TestimonialsBlock %>