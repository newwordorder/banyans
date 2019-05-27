<?php
/**
* Template Name: Home
*
*
* @package understrap
*/

get_header();


$image = get_field('background_image');

$backgroundImage = get_field('background_image');

$image = $backgroundImage['background_image'];
$backgroundEffect = $backgroundImage['background_effect'];

$headerText = get_field('home_header_text');
?>
<div class="overlayLayer"></div>
<section id="sub-header"

class="page-header page-header--home bg-effect--<?php echo $backgroundEffect ?> imagebg"
data-overlay="1"
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
      <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
    </div>
  <?php endif; ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 text-center">
    <?php if($headerText): ?>
      <?php echo $headerText; ?>
       <? else: ?>
       <h1 class="page-title"><?php the_title(); ?></h1>
       <?php endif; ?>
    </div>
  </div>
</div>

<div class="split__container container">
<div class="row split__row">
  <div class="col-md-12 text-center py-4"><p class="heading__split--title"><?php the_field('heading'); ?></p></div>
  <div class="col-md-12">
  <div class="row">
    <a href="<?php the_field('left_button_link'); ?>" class="col-md-5 offset-md-1 heading__split heading__split--left"><h4><?php the_field('left_button_text'); ?></h4> <i class="fal fa-arrow-right"></i></a>
    <a href="<?php the_field('right_button_link'); ?>" class="col-md-5 heading__split heading__split--right"><h4><?php the_field('right_button_text'); ?></h4> <i class="fal fa-arrow-right"></i></a>
    </div>
  </div>
  <div class="col-md-12 text-center py-4"><a href="<?php the_field('bottom_button_link'); ?>" class="heading__split--bottom"><?php the_field('bottom_button_text'); ?> <i class="far fa-arrow-right"></i></a></div>
  </div>
</div>

<?php get_template_part( 'page-templates/blocks/overlap' ); ?>

</section>
<div class="remainder">
<?php get_template_part( 'page-templates/blocks' ); 
      get_template_part( 'page-templates/blocks/pre-footer-cta' );
?>
</div>
<script src="<?php echo get_template_directory_uri(); ?>/js/homeIntro.js"></script>

<?php get_footer();
