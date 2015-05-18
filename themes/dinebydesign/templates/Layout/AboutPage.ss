
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
         <img src="$HeaderImage.CroppedImage(1200, 400).Link" alt="$HeaderImage.Title">
      </div>
      
      <div class="clearfix">
         <section class="contentSide">
            <h2>$Title</h2>
            <p>$Content</p>
         </section>
         <div class="sidebar">
            <% include NewsletterForm %>
            <% include CallbackRequest %>
            <% include Brochure %>
         </div>
      </div>
      <% if CTABoxTitle %>
         <div class="statisticsBoxesHeader">
            <h2>$CTABoxTitle</h2>
         </div>

         <% include CTABox %>
      <% end_if %>
      <% if TeamMembers %>
         <div class="membersHeader">
            <h2>Team members</h2>
         </div>
      <% end_if %>
   </div>
</div>
<% if TeamMembers %>
   <div class="violetBg">
      <div class="wrapper1220">
         <section class="membersWrapper clearfix">
         <% loop TeamMembers.Sort(SortOrder) %>
            <div class="member">
               <div class="image">
                  <div><img src="$ProfileImage.URL" alt=""></div>
               </div>
               <div class="name">$Name</div>
               <div class="position">$Position</div>
               <p>$AboutMe</p>
               <ul>
                  <% if Email %>
                     <li><a href="#"><span>email:</span> $Email</a></li>
                  <% end_if %>
                  <% if Mobile %>
                     <li><a href="#"><span>mobile:</span> $Mobile</a></li>
                  <% end_if %>
                  <% if LinkedIn %>
                     <li><a href="#"><span>linkedin:</span> $LinkedIn</a></li>
                  <% end_if %>
               </ul>
            </div>
         <% end_loop %>
         </section>
      </div>
   </div>
<% end_if %>