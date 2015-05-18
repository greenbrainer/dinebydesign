<div class="violetBg">
   <div class="wrapper1140">
      <section class="information bottomContact">
         <h1>Contact</h1>
         <div class="excerpt clearfix">
            <% if $SiteConfig.PhoneNumber %>
            <div class="excerptRow">
               <h3>telephone:</h3>
               <a href="tel:$SiteConfig.PhoneNumber">$SiteConfig.PhoneNumber</a>
            </div>
            <% end_if %>
            <% if $SiteConfig.Email %>
            <div class="excerptRow">
               <h3>e-mail:</h3>
               <a href="mailto:$SiteConfig.Email">$SiteConfig.Email</a>
            </div>
            <% end_if %>
         </div>
      </section>
   </div>
</div>

<div class="rightVioletBg">
   <div class="bgWrapper"></div>
   <div class="wrapper1220 clearfix">
      <div class="clearfix">
         <section class="contentSide">
            $Content
            <div class="clearfix"></div>
            <h2>Find us</h2>
            <div class="map">
               <div class="jsContactMap" style="height: 100%;" data-lat="52.2793845" data-lng="-0.8753513" data-zoom="15"></div>
            </div>
         </section>
         <div class="sidebar">
            <div class="orangeBox contactForm" style="padding-bottom:1px;">
                <% if Success %>
                    <div style="color: #3c763d; background: #dff0d8; border-color: #d6e9c6; padding:15px; border-radius:4px;">$ThankyouMessage</div>
                <% else %>
                    <h2>//Fill in the form</h2>
                    <h3>and we will call you back</h3>
                    <div class="contact">
                        $ContactForm
                    </div>
                <% end_if %>
            </div>
            <% include Brochure %>
         </div>
      </div>
   </div>
</div>