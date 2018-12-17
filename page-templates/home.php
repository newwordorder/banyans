<?php
/**
* Template Name: Home
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
$invertColours = $backgroundImage['invert_colours'];

$video = get_field('youtube_code');
$fallbackImage = get_field('fallback_image');
?>

<section id="sub-header"

class="page-header page-header--home bg-effect--<?php echo $backgroundEffect ?> imagebg"
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

<div class="split__container container">
<div class="row split__row">
  <div class="col-md-12 text-center py-4"><p class="heading__split--title">Are you seeking support for...</p></div>
  <div class="col-md-12">
  <div class="row">
    <div class="col-md-5 offset-md-1 heading__split heading__split--left"><h3>Yourself?</h3> <i class="fal fa-arrow-right"></i></div>
    <div class="col-md-5 heading__split heading__split--right"><h3>A loved one?</h3> <i class="fal fa-arrow-right"></i></div>
    </div>
  </div>
  </div>
  </div>



</section>

<?php get_template_part( 'page-templates/blocks' ); 
      get_template_part( 'page-templates/blocks/pre-footer-cta' );

?>

<?php get_footer();
