 <head>
   <% base_tag %>
   <title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
   $MetaTags(false)
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
   
   <link rel="stylesheet" media="screen" href="$themeDir/css/style.css">
   <link rel="stylesheet" href="{$Link}themecss" type="text/css" />
   
   <script type="text/javascript">
      window.odometerOptions = {
         auto: true,
         selector: '.jsOdometer',
         format: 'd',
         duration: 3000,
      };
   </script>
   
   <script src="$themeDir/javascript/libs.js"></script>
      <script type="text/javascript" src="http://maps.google.com.mx/maps/api/js?sensor=false&amp;language=en"></script>
   <script src="$themeDir/javascript/main.js"></script>
   
   <!--[if lt IE 9]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
   <![endif]-->
   
   <link rel="apple-touch-icon" sizes="57x57" href="$themeDir/images/favicons/apple-touch-icon-57x57.png">
   <link rel="apple-touch-icon" sizes="60x60" href="$themeDir/images/favicons/apple-touch-icon-60x60.png">
   <link rel="apple-touch-icon" sizes="72x72" href="$themeDir/images/favicons/apple-touch-icon-72x72.png">
   <link rel="apple-touch-icon" sizes="76x76" href="$themeDir/images/favicons/apple-touch-icon-76x76.png">
   <link rel="apple-touch-icon" sizes="114x114" href="$themeDir/images/favicons/apple-touch-icon-114x114.png">
   <link rel="apple-touch-icon" sizes="120x120" href="$themeDir/images/favicons/apple-touch-icon-120x120.png">
   <link rel="apple-touch-icon" sizes="144x144" href="$themeDir/images/favicons/apple-touch-icon-144x144.png">
   <link rel="apple-touch-icon" sizes="152x152" href="$themeDir/images/favicons/apple-touch-icon-152x152.png">
   <link rel="apple-touch-icon" sizes="180x180" href="$themeDir/images/favicons/apple-touch-icon-180x180.png">
   <link rel="icon" type="image/png" href="$themeDir/images/favicons/favicon-32x32.png" sizes="32x32">
   <link rel="icon" type="image/png" href="$themeDir/images/favicons/favicon-194x194.png" sizes="194x194">
   <link rel="icon" type="image/png" href="$themeDir/images/favicons/favicon-96x96.png" sizes="96x96">
   <link rel="icon" type="image/png" href="$themeDir/images/favicons/android-chrome-192x192.png" sizes="192x192">
   <link rel="icon" type="image/png" href="$themeDir/images/favicons/favicon-16x16.png" sizes="16x16">
   <link rel="manifest" href="$themeDir/images/favicons/manifest.json">
   <meta name="msapplication-TileColor" content="#ffffff">
   <meta name="msapplication-TileImage" content="$themeDir/images/favicons/mstile-144x144.png">
   <meta name="theme-color" content="#ffffff">
</head>
   