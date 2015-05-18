<% if GetTestimonials %>
   <section class="testimonials">
      <div class="testimonialsWrapper wrapper1140 clearfix jsSliderTestimonialsWrapper">
         <h2>Testimonial</h2>
         <div class="jsSliderTestimonials">
            <% loop GetTestimonials(3) %>
               <div class="testimonial clearfix">
                  <div class="content">
                     <div class="name">$Author</div>
                     <div class="company">$CompanyName</div>
                     <p>$Content</p>
                     <% if CaseStudy %>
                        <a href="$CaseStudy.Link" class="button buttonViolet">case study</a>
                     <% end_if %>
                  </div>
                  <div class="image">
                     <div><img src="$AuthorImage.URL" alt=""></div>
                  </div>
               </div>
            <% end_loop %>
         </div>
      </div>
   </section>
<% end_if %>