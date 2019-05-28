<?php
/**
 * The template for displaying all people.
 *
 * @package understrap
 */

get_header();

$image = get_field('background_image');
$position = get_field('position');
$portrait = get_field('portrait_photo')
?>
<?php while ( have_posts() ) : the_post(); ?>
<section id="sub-header"

class="page-header page-header--team bg-effect--<?php echo $backgroundEffect ?> imagebg <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?>"
data-overlay="6"
>

<?php

if( !empty($image) ):

  // vars
  $url = $image['url'];
  $alt = $image['alt'];
  $size = 'large';
  $thumb = $image['sizes'][ $size ];
  $width = $image['sizes'][ $size . '-width' ];
  $height = $image['sizes'][ $size . '-height' ];

  ?>
  <div class="background-image-holder">
    <img data-src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
  </div>
<?php endif; ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 text-center">

      <h1><?php the_title(); ?></h1>
      <hr class="line"/>
      <h5 class="mt-4"><?php echo $position; ?></h5>

    </div>
  </div>
</div>
<?php get_template_part( 'page-templates/blocks/overlap' ); ?>
</section>
<section id="single-wrapper" class="bg--light">

	<div class="container" id="content" tabindex="-1">



			<main id="main">

      <div class="portrait">
        <div class="background-image-holder">
          <img data-src="<?php echo $portrait['url']; ?>"/>
        </div>
      </div>



            <div class="row justify-content-center">
              <div class="col-md-8">

              <?php the_content(); ?>


              </div>
            </div>

        




			</main><!-- #main -->




</div><!-- Container end -->

</section><!-- Wrapper end -->

<?php endwhile; // end of the loop. ?>

<?php get_template_part('./page-templates/blocks/pre-footer-cta'); ?>

<?php get_footer(); ?>
