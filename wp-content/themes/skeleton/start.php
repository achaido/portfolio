<?php 

/**
 * Template Name: Start
 * Description: Use for landing
 * By: Petter Palander
 */

get_header(); ?>

<!--
  <?php $acs -> query_posts(array('group_name' => 'fuck')); ?>
-->
  <?php $acs -> query_posts(array()); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  	<article>

  		<!-- Header & Content -->
  		<div class="main-content">
	  		<h2><?php the_title(); ?></h2>
	      	<?php the_content(); ?>
  		</div>

  		<!-- Post Image -->
		<div class="image">
 		    <?php if ( function_exists( 'get_the_image' ) ) get_the_image( array( 'size' => 'large', 'image_class' => 'icon', 'link_to_post' => false )); ?>
  		</div>
   	</article>

   	<?php 
   		$key_1_value = get_post_meta($post->ID, 'royal-slider', true);
   		if($key_1_value != ''){
   			echo get_royalslider( $key_1_value );
   		}	
   	?>
  <?php endwhile; else : endif; ?>

<?php get_footer(); ?>