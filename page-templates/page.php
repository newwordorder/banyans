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
$headerText = get_field('header_text');

?>

<section id="sub-header"

class="page-header page-header--page bg-effect--<?php echo $backgroundEffect ?> imagebg"
data-overlay="5"
>


  <?php if( !empty($image) ):

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
    <div class="col-md-10 text-center">
      <?php if($headerText): ?>
      <h1><?php echo $headerText; ?></h1>
       <? else: ?>
       <h1><?php the_title(); ?></h1>
       <?php endif; ?>
       <hr class="line"/>
    </div>
  </div>
</div>

<?php get_template_part( 'page-templates/blocks/overlap' ); ?>




</section>

<?php if( get_field('include_internal_navigation') == 'yes' ): ?>

  <?php if( have_rows('internal_page_navigation') ): ?>
  <section class="space--md bg--light">
<div class="container text-center">
  <h6>On this page:</h6>
  <ul class="internal-navigation">
    <?php while( have_rows('internal_page_navigation') ): the_row();
      $text = get_sub_field('link_text');
      $id = get_sub_field('content_id');
      ?>
      <li><a href="#<?php echo $id ?>"><?php echo $text ?></a></li>

    <?php endwhile; ?>
    </ul>
</div>
</section>
  <?php endif; ?>
<?php endif; ?>


  

<?php get_template_part( 'page-templates/blocks' );
      get_template_part( 'page-templates/blocks/pre-footer-cta' );

?>

<?php get_footer();
