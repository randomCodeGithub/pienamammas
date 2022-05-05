<?php get_template_part('template-parts/head'); ?>
<div <?php if (is_front_page()) echo 'id="front-end-menu"' ?> class="topmenu <?php echo (is_front_page()) ? 'front-page-topmenu' : 'not-front-page'; ?> fixed-top">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="<?php echo site_url(); ?>">
            <!-- <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/pm_logo.svg" alt="Logo" /> -->
            <img src="<?php the_field("logo", "option"); ?>" alt="Logo">
          </a>

          <style>
            /* ONLY FOR SAFARI */
            @media not all and (min-resolution:.001dpcm) {
              .topmenu .navbar-light .navbar-nav a {
                font-weight: 550;
              }

              .topmenu .navbar-light .navbar-nav a.pm-btn__nav {
                font-weight: 600;
              }

              div.body-small.is-hover {
                font-weight: 590 !important;
              }

              div.body-small.is-hover .description-area p {
                font-weight: 400 !important;
              }

              .properties ul .point {
                -webkit-font-smoothing: antialiased;
              }

              .security-page ul li::before {
                top: -10.1px;
              }

              @media (max-width: 767.98px) {
                .security-page ul li::before {
                top: -7.5px;
              }
              }

              @media (min-width: 768px) and (max-width: 991.98px) {
                .security-page ul li::before {
                top: -6.1px;
              }
              }

              @media (min-width: 992px) and (max-width: 1199.98px) {

                .topmenu.front-page-topmenu .navbar-light .navbar-nav a:not(a.pm-btn),
                .topmenu.not-front-page .navbar-light .navbar-nav a:not(a.pm-btn) {
                  margin-left: 0.5rem;
                }

              }

            }
          </style>

          <?php if (has_nav_menu('header-tablet-nav')) : ?>
            <div class="navigation-md d-none d-md-flex d-lg-none ml-md-auto">
              <?php
              $defaults = array(
                'theme_location' => 'header-tablet-nav',
                'menu' => '',
                'container' => false,
                'container_class' => '',
                'container_id' => '',
                'menu_class' => 'd-flex overlay',
                'menu_id' => 'overlay',
                'echo' => false,
                'fallback_cb' => 'wp_page_menu',
                'add_li_class'  => 'your-class-name1 your-class-name-2',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<div>%3$s</div>',
                'depth' => 0,
                'walker' => ''
              );
              // echo strip_tags(wp_nav_menu($defaults), '<a>');
              echo strip_tags(wp_nav_menu($defaults), '<a>');
              ?>
            </div>
          <?php endif ?>


          <div class="menu-btn position-relative ml-auto d-lg-none">
            <span class="toggler"></span>
          </div>

          <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav text-uppercase">
              <!-- <a href="./about-project.html">Par projektu</a>
              <a href="./breasts-milk.html">Krūts piens</a>
              <a href="./security-page.html">Drošība</a>
              <a href="./expert-opinion.html">Ekspertu viedokļi</a>
              <a href="./experience-stories.html">Pieredzes stāsti</a>
              <a href="./useful-posts.html">Noderīgi</a>
              <a class="pm-btn pm-btn__nav" href="./login-page.html">Pievienoties</a> -->
              <?php
              $defaults = array(
                'theme_location' => 'header-nav',
                'menu' => '',
                'container' => false,
                'container_class' => '',
                'container_id' => '',
                'menu_class' => 'd-flex overlay',
                'menu_id' => 'overlay',
                'echo' => false,
                'fallback_cb' => 'wp_page_menu',
                'add_li_class'  => 'your-class-name1 your-class-name-2',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<div>%3$s</div>',
                'depth' => 0,
                'walker' => ''
              );
              // echo strip_tags(wp_nav_menu($defaults), '<a>');
              echo strip_tags(wp_nav_menu($defaults), '<a>');
              ?>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="overlay-menu fixed-top d-lg-none">
  <div class="container">
    <div class="row">
      <div class="col-11 col-md-12 mx-auto">
        <div class="overlay-menu__area w-100">
          <div class="navbar-list">
            <div class="navbar-nav text-uppercase">
              <!-- <a href="./about-project.html">Par projektu</a>
              <a href="./breasts-milk.html">Krūts piens</a>
              <a href="./security-page.html">Drošība</a>
              <a href="./expert-opinion.html">Ekspertu viedokļi</a>
              <a href="./experience-stories.html">Pieredzes stāsti</a>
              <a href="./useful-posts.html">Noderīgi</a>
              <a class="pm-btn pm-btn__nav d-md-none" href="./login-page.html">Pievienoties</a> -->
              <?php
              $defaults = array(
                'theme_location' => 'header-nav',
                'menu' => '',
                'container' => false,
                'container_class' => '',
                'container_id' => '',
                'menu_class' => 'd-flex overlay',
                'menu_id' => 'overlay',
                'echo' => false,
                'fallback_cb' => 'wp_page_menu',
                'add_li_class'  => 'your-class-name1 your-class-name-2',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<div>%3$s</div>',
                'depth' => 0,
                'walker' => ''
              );
              // echo strip_tags(wp_nav_menu($defaults), '<a>');
              echo strip_tags(wp_nav_menu($defaults), '<a>');
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="<?php if (!is_front_page()) echo 'body-margin' ?> site-content">

<!-- <div class="notification-new-user w-100 -h-100" style="rgba(255,255,255, 0.2); z-index: 999999999999;">
<div class="notification-new-user-textarea" style="width: 60%; height: 60%">

</div>
</div> -->
<?php 
// @ini_set('display_errors', 1);
// require_once("wp-load.php");
// $to = 'tawerwater70@gmail.com';
// $subject = 'The subject';
// $body = 'The email body content';
// $headers = array('Content-Type: text/html; charset=UTF-8');
 
// wp_mail( $to, $subject, $body, $headers );
?>