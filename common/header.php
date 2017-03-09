<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_url('//fonts.googleapis.com/css?family=Lato');
    queue_css_file(array('iconfonts', 'style'));
    echo head_css();
    ?>


  <link rel="stylesheet" href="www.archivocontralapared.com/themes/emiglio/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="www.archivocontralapared.com/themes/emiglio/owlcarousel/owl.theme.default.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oxygen+Mono" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Anonymous+Pro" rel="stylesheet">  

<link rel='stylesheet' href='https://d33wubrfki0l68.cloudfront.net/css/34571ca2ffb416eeb125ab4fc2850add8cf8fd04/share-button.min.css'/>
  <link href='https://fonts.googleapis.com/css?family=Source+Code+Pro' rel='stylesheet' type='text/css'>
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
    <style>
    share-button {
      z-index: 2;
      -webkit-transform: translate(-50%, -50%);
      -moz-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
    </style>

    <!-- JavaScripts -->

    <?php
    queue_js_file(array('vendor/jquery-accessibleMegaMenu','emiglio', 'globals'));
    echo head_js();
    ?>


</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="http://www.archivocontralapared.com/themes/emiglio/js/index.js"></script> 


    <div id="wrap">

        <div class="acon-button sticky" style="top: 0px; position: fixed;">
            <div class="hidden-logo">
            <a class="acon-button__button">
                <mask id="circle" height="200" width="200" y="0" x="0">
<circle fill="white" r="96" cy="100" cx="100">
</mask>
                <img height="192" width="192" y="4" x="4" src="http://www.archivocontralapared.com/files/square_thumbnails/00dc8958af1b07a3668f3ba1afbdb28e.jpg"></img>
            </a>
        </div>

        </div>
            
        <header role="banner">

            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>


            <div id="site-title"><?php echo link_to_home_page(theme_logo()); ?></div>

            <div id="search-container" role="search">
                <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                <?php echo search_form(array('show_advanced' => true)); ?>
                <?php else: ?>
                <?php echo search_form(); ?>
                <?php endif; ?>
            </div>

            <nav id="top-nav" role="navigation">
                <?php echo public_nav_main(); ?>
            </nav>

            <?php echo theme_header_image(); ?>


        </header>

        <article id="content" role="main" tabindex="-1">

            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>



