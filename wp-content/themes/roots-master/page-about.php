<?php
if ( get_query_var('paged') ) $paged = get_query_var('paged');  
if ( get_query_var('page') ) $paged = get_query_var('page');
 
$query = new WP_Query( array( 'post_type' => 'static_block_about', 'paged' => $paged, 'order' => 'ASC' ) );
$page = get_page_by_title( 'about' );
$content = apply_filters('the_content', $page->post_content); 

?>
<!-- about us -->
  <article class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 articles">
          <div class="about-page">
            <div class="content">
              <div class="about-logo">
                <div class="row">
                  <div class="line-opacity line col-xs-4 col-sm-4 col-md-5 col-lg-5"></div>
                  <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
                    <img class="images logo-circle img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_circle.svg">
                  </div>
                  <div class="line-opacity line col-xs-4 col-sm-4 col-md-5 col-lg-5"></div>
                </div>
              </div>
              <?php echo $content; ?>
              <div class="row">
                <?php 
                  if ( $query->have_posts() ) : 
                    while ( $query->have_posts() ) : $query->the_post();
                      $image = get_field('user_image');
                ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                  <div class="content-text thumb">
                    <img class="images img-responsive" src="<?php echo $image['url']; ?>" >
                    <div class="mask">
                      <ul id="social">
                        <li class="fb"><a href="<?php the_field('facebook_link'); ?>"></a></li>
                        <li class="tw"><a href="<?php the_field('twitter_link'); ?>"></a></li>
                        <li class="gp"><a href="<?php the_field('googleplus_link'); ?>"></a></li>
                      </ul>
                      
                    </div>
                  </div>
                  <h2 class="service-title"><?php the_title(); ?></h2>
                  <?php the_content(); ?>
                </div>
                <?php 
                    endwhile; wp_reset_postdata();
                  //else :
                  endif;
                ?>
              </div>
            </div>
          </div>
        </div>
      </article>