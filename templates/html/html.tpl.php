<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

  <head>
    <title><?php print $head_title; ?></title>

    <?php print $head; ?>
        
  	<!-- Import Stylesheets -->
    <?php print $styles; ?>
     
    <script src="https://use.typekit.net/gxg7qqx.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
  </head>

  <body class="<?php print $classes; ?>" <?php print $attributes; ?>>
    <!--[if lte IE 8]>
      <div class="chromeframe">
        You are using an <strong>outdated</strong> browser.<br/>
        Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
      </div>
    <![endif]-->

    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
    
  	<!-- Javascript -->
    <?php print $scripts; ?>

    <?php if( $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ) { ?>
    <!-- Live Reload -->
    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35730/livereload.js?snipver=1"></' + 'script>')</script>
    <?php } ?>
  </body>

</html>
