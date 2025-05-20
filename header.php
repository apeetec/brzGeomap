<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Gabriel Batista">
    <!-- Descrição -->
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
    <!-- Titulo -->
    <title><?php if(is_home()) { echo get_bloginfo('name') . ' | ' . get_bloginfo('description'); } else { echo get_the_title() . ' | ' . get_bloginfo('name'); } ?></title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/favicon.png">
    <!-- CSS Gabriel -->
    <!-- <link href="<?php bloginfo('template_url'); ?>/resets.css" rel="stylesheet"> -->
    <link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet">
    <!-- Materialize -->
    <link href="<?php bloginfo('template_url'); ?>/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
   <!-- Magnify -->
    <link href="<?php bloginfo('template_url'); ?>/css/magnify.css" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   <!-- Swiper CSS (CDN) -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
   <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/swipper-cidades.css">
    <!-- SLICK SLIDE 1/3 -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
    <!-- Owl carousel -->
    <link href="<?php bloginfo('template_url'); ?>/css/owl.carousel.css" rel="stylesheet">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <nav role="navigation" hidden class="">
      <div class="nav-wrapper container">
        <a href="<?php echo get_site_url(); ?>" class="brand-logo">Logo</a>
        <!-- Menu desktop -->
        <ul class="right hide-on-med-and-down">
          <li><a href="">Navbar Link</a></li>
        </ul>
        <!-- Menu mobile -->
        <ul id="nav-mobile" class="sidenav">
          <li><a href="#">Navbar Link</a></li>
          <li><a href="#" id="fechar">Fechar</a></li>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"
          ><i class="material-icons menu">menu</i></a
        >
      </div>
    </nav>
    <main>
