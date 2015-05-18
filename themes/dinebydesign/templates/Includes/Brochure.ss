<div class="orangeBox contactForm" style="padding-top:20px;">

    <h2>//Online Brochure</h2>

    <div class="brochure contact clearfix">
        
        <h3>Send to my email address</h3>
        
        $BrochureForm

        <br><h3>Or get the brochure</h3><br>

        <ul>
            <% if $SiteConfig.UsePDFOnline %>
                <li>
                    <a href="$SiteConfig.BrochurePDF.URL">
                        <img src="$themeDir/images/newsletter_eye.svg" width="49" class="svg" alt="View online">
                        <span>VIEW ONLINE</span>
                    </a>
                </li>
            <% else_if $SiteConfig.OnlineBrochureLink %>
                <li>
                    <a href="$SiteConfig.OnlineBrochureLink">
                        <img src="$themeDir/images/newsletter_eye.svg" width="49" class="svg" alt="View Online">
                        <span>VIEW ONLINE</span>
                    </a>
                </li>
            <% end_if %>

            <% if $SiteConfig.BrochurePDF %>
                <li>
                    <a href="$SiteConfig.BrochurePDF.URL" download="$SiteConfig.BrochurePDF.Title">
                        <img src="$themeDir/images/newsletter_docs.svg" width="49" class="svg" alt="Download now">
                        <span>DOWNLOAD NOW</span>
                    </a>
                </li>
            <% end_if %>
        </ul>
    </div>
</div>
