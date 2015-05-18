<div class="violetBg">
   <div class="wrapper1140">
      <section class="information">
         <h1>$Title</h1>
      </section>
   </div>
</div>

<div class="rightGrayBg">
   <div class="bgWrapper"></div>
   <div class="wrapper1220 clearfix">
      <div class="mainImage">
         <img src="$Image.CroppedImage(1200, 400).Link" alt="$Image.Title">
      </div>
      
      <div class="clearfix">
         <section class="contentSide">
            
            $Content
            
            <div class="clearfix"></div>

            $Form
            
         </section>
         <div class="sidebar">
            <% include NewsletterForm %>
            <% include CallbackRequest %>
            <% include Brochure %>
         </div>
      </div>
   </div>
</div>
<% if StatisticsBoxes %>
   <div class="wrapper1220 clearfix">
      <div class="statisticsBoxesHeader">
         <h2>$CTABoxTitle</h2>
      </div>
      
      <% include CTABox %>
   </div>
<% end_if %>
<% include TestimonialsBlock %>