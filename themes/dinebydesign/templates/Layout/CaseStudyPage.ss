
<div class="violetBg">
   <div class="wrapper1140">
      <section class="information">
         <h1>$Title</h1>
         <div class="excerpt">$Excerpt</div>
      </section>
   </div>
</div>

<div class="rightGrayBg">
   <div class="bgWrapper"></div>
   <div class="wrapper1220 clearfix">
      <div class="mainImage">
         <img src="$CaseStudyImage.CroppedImage(1200, 400).Link" alt="$CaseStudyImage.Title">
      </div>
      
      <div class="clearfix">
         <section class="contentSide">
           $Content
           <div class="clearfix"></div>
            <% if ContentTabs %>
               <div class="tabs">
                  <div class="tabsLine"><div class="belt jsTabsBelt"></div></div>
                  <div class="tabsHeader clearfix">
                     <% loop ContentTabs.Sort(SortOrder) %>
                        <a href="#" class="tab jsTabsButton <% if First %>active<% end_if %>" data-tab-id="$ID">
                           $Title
                        </a>
                     <% end_loop %>
                  </div>
                  <div class="tabsContent">
                     <% loop ContentTabs.Sort(SortOrder) %>
                        <div class="content jsTabsContent <% if First %>active<% end_if %>" data-tab-id="$ID">
                           <p>
                              $Content 
                           </p>
                        </div>
                     <% end_loop %>
                  </div>
               </div>
            <% end_if %>

            <% if GalleryImages %>
               <section class="gallery">
                  <h2>Gallery</h2>
                  <div class="jsSliderGallery">
                     <% loop GalleryImages %>
                        <div class="image"><img src="$Image.URL" al=""></div>
                     <% end_loop %>
                  </div>
               </section>
            <% end_if %>

         </section>

        <div class="sidebar">
            <% include NewsletterForm %>
            <% include CallbackRequest %>
            <% include Brochure %>
        </div>

      </div>
   </div>
</div>
