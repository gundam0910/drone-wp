<?php
if ( get_query_var('paged') ) $paged = get_query_var('paged');  
if ( get_query_var('page') ) $paged = get_query_var('page');
 
$query = new WP_Query( array( 'post_type' => 'static_block', 'paged' => $paged, 'order' => 'ASC' ) );
 // var_dump($query->post->post_name);
if ( $query->have_posts() ) : ?>
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
	
<?php switch ($query->post->post_name) {
	case 'home-page':
?>
	<article class="row">
	    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 articles">
	      <div class="top-page">
	        <div class="content">
	          <?php the_content(); ?>
	        </div>
	      </div>
	      
	    </div>
	    
	  </article>
<?php
		break;
	case 'about-page':
?>
<!-- about us -->
  <article class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 articles">
      <div class="about-page">
        <div class="content">
          <div class="about-logo">
            <div class="line-opacity line col-xs-2 col-sm-4 col-md-5 col-lg-5"></div>
            <img class="images logo-circle" src="/wp-content/themes/roots-master/assets/img/logo_circle.svg">
            <div class="line-opacity line col-xs-3 col-sm-5 col-md-5 col-lg-5"></div>
          </div>
          <?php the_content(); ?>
          <div class="row">
            <div class="button col-xs-10 col-sm-6 col-md-8 col-lg-3">About Us</div>
          </div>
        </div>
      </div>
    </div>
  </article>
<?php
		break;
	case 'work-page':
?>
<!-- work -->
  <article class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 articles">
       <div class="work-page">
        <div class="content">
          <?php the_content(); ?>
          <div class="content-text bg-img">
            <img class="images" src="/wp-content/themes/roots-master/assets/img/btn_play.svg" class="img-responsive">
          </div>
          <div class="row">
            <div class="button col-xs-10 col-sm-6 col-md-8 col-lg-3">View All Works</div>
          </div>
        </div>
      </div>
    </div>
  </article>
<?php
		break;
	case 'service-page':
?>
<!-- service -->
  <article class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 articles">
      <div class="service-page">
        <div class="content">
          <?php the_content(); ?>
          
        </div>
          <div class="row">
            <div class="button col-xs-10 col-sm-6 col-md-8 col-lg-3">Read More Services</div>
          </div>
      </div>
    </div>
  </article>
<?php
		break;
	case 'think-page':
?>
<!-- thinking -->
  <article class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 articles">
      <div class="thinking-page">
        <div class="content">
          <?php the_content(); ?>
          <div class="line-opacity width100"></div>
          <div class="row">
            <div class="button col-xs-10 col-sm-6 col-md-8 col-lg-3"><a href="#">Thinking</a></div>
          </div>
        </div>
        
      </div>
    
    </div>
  </article>
<?php
		break;
	case 'contact-page':
?>
<!-- contact us -->
  <article class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 articles">
      <div class="contact-page">
        <div class="content">
          <?php the_content(); ?>
          <form role="form">
            <div class="row">
              <div class=" col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <input type="text" class="form-control" id="name" placeholder="Name">
              </div>
              <div class=" col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <input type="email" class="form-control" id="email" placeholder="Email">
              </div>
            </div>
            <div class="row">
              <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
              <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <textarea class="form-control" rows="3"></textarea>
              </div>
            </div>
            <!-- <button type="submit" class="btn btn-default">Submit</button> -->
            <div class="row" style="padding-top: 40px;">
              <div class="button col-xs-10 col-sm-6 col-md-8 col-lg-3">Contact Us</div>
            </div>
          </form>
        </div>
        
      </div>
    
    </div>
  </article>
<?php
	break;
}
?>
  <?php endwhile; wp_reset_postdata(); ?>
<?php else : ?>
	<!-- show 404 error here -->
<?php endif; ?>