<?php
/**
 * The template for displaying the about page
 *
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 2.0
 */

 get_header(); ?>

 <div id="primary" class="about-page hero-content">
   <div class="main-content" role="main">
     <?php while ( have_posts() ) : the_post();
       $about = get_field('about');
     ?>
       <h3><?php echo $about; ?></h3>
     <?php endwhile; // end of the loop. ?>
   </div><!-- .main-content -->
 </div><!-- #primary -->

 <div class="site-content service-intro">
   <div class="main-content">
     <?php while ( have_posts() ) : the_post();?>
       <h2><?php the_title();  ?></h2>
       <p><?php the_content(); ?></p>
     <?php endwhile; // end of the loop. ?>
   </div><!-- .main-content -->
 </div><!-- #primary -->

 	<div class="site-content">
 		<div class="main-content services">
      <?php query_posts('post_type=services');
      $numcheck = 0;
      $order_image = 'first';
      $order_text = 'first';
      ?>
 			<?php while ( have_posts() ) : the_post();
 				$size = "full";
        $numcheck = $numcheck+1;
 			?>
      <?php if ($numcheck % 2 == 0) {
        $order_image = 'second';
        $order_text = 'first';
      } else {
        $order_image = 'first';
        $order_text = 'second';
      } ?>
        <article class="service">
          <aside class="service-description <?php echo $order_text ?>">
   					<h2><?php the_title();  ?></h2>
   					<p><?php the_content(); ?></p>
          </aside>
          <aside class="service-image <?php echo $order_image ?>">
            <?php if ( has_post_thumbnail() ) : ?>
      			  <figure><?php the_post_thumbnail($size); ?></figure>
      			<?php endif; ?>
          </aside>
   			</article>
 			<?php endwhile; // end of the loop. ?>
 		</div><!-- .main-content -->

 	</div><!-- #primary -->

 <?php get_footer(); ?>
