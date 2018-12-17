<?php
/**
* Template Name: Page
*
*
* @package understrap
*/

get_header();

$headerType = get_field('image_or_video');

$image = get_field('background_image');
$imageOverlay = get_field('image_overlay');

$backgroundImage = get_field('background_image');

$image = $backgroundImage['background_image'];
$imageOverlay = $backgroundImage['image_overlay'];
$backgroundEffect = $backgroundImage['background_effect'];

?>

<section id="sub-header"

class="page-header page-header--page bg-effect--<?php echo $backgroundEffect ?> imagebg"
data-overlay="5"
>


  <?php if( !empty($image) ):

    // vars
    $url = $image['url'];
    $alt = $image['alt'];

  ?>
    <div class="background-image-holder">
      <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
    </div>
  <?php endif; ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 text-center">

      <h1 class="page-title"><?php the_title(); ?></h1>

    </div>
  </div>
</div>



</section>

<?php get_template_part( 'page-templates/blocks' );
      get_template_part( 'page-templates/blocks/pre-footer-cta' );

?>

<?php get_footer();
