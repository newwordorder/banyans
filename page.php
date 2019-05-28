<?php
/**
 * The template for displaying all default posts.
 *
 * @package understrap
 */

get_header();
$backgroundImage = get_field('background_image');

$image = $backgroundImage['background_image'];
$imageOverlay = $backgroundImage['image_overlay'];
$backgroundEffect = $backgroundImage['background_effect'];
$invertColours = $backgroundImage['invert_colours'];
?>
<?php while ( have_posts() ) : the_post(); ?>
<section id="sub-header"

class="page-header page-header--page bg-effect--<?php echo $backgroundEffect ?> imagebg <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?>"
data-overlay="7"
>

<?php

if( !empty($image) ):

  // vars
  $url = $image['url'];
  $alt = $image['alt'];

  ?>
  <div class="background-image-holder">
    <img data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
  </div>
<?php endif; ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 text-center">
      <h1><?php the_title(); ?></h1>
      <hr class="line mt-2" />
    </div>
  </div>
</div>

<?php get_template_part( 'page-templates/blocks/overlap' ); ?>

</section>

<section id="single-wrapper" class="space--md bg--light">

	<div class="container" id="content" tabindex="-1">

			<main id="main">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <?php the_content(); ?>
            </div>
          </div>

          <?php  // check if the flexible content field has rows of data
          if( have_rows('posts_blocks') ):

            // loop through the rows of data
            while ( have_rows('posts_blocks') ) : the_row();

            if( get_row_layout() == 'text_block' ): ?>

            <div class="row justify-content-center my-5">
              <div class="col-md-8">

                <?php the_sub_field('text_block'); ?>

              </div>
            </div>

          <?php  endif;

          if( get_row_layout() == 'image_block' ): ?>

          <div class="row justify-content-center my-5">
            <div class="col-md-10">
            <?php
							$image = get_sub_field('image');
            if( !empty($image) ):

            // vars
            $url = $image['url'];
            $alt = $image['alt'];

            ?>
              <img data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
            <?php endif; ?>

            </div>
          </div>
          <?php endif; ?>
          <?php  endwhile;

          endif;

          ?>
      </main><!-- #main -->

</div><!-- Container end -->

</section><!-- Wrapper end -->


<?php endwhile; // end of the loop. ?>

<?php 
        get_template_part( 'page-templates/blocks/pre-footer-cta' );
        get_footer(); 
      ?>
