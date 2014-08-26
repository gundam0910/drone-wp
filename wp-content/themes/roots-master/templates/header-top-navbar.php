<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <img class="to-open" src="/wp-content/themes/roots-master/assets/img/btn_drawer_slide.png">
        <img class="to-close" src="/wp-content/themes/roots-master/assets/img/btn_drawer_collapse.png">
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>/"><img id="logo" src="/wp-content/themes/roots-master/assets/img/logo_fullcolor.svg" class="img-responsive"></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav pull-right'));
        endif;
      ?>
    </nav>
  </div>
</header>
