<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$backgroundImage = get_field('background_image');

$image = $backgroundImage['background_image'];
$imageOverlay = $backgroundImage['image_overlay'];
$backgroundEffect = $backgroundImage['background_effect'];
$invertColours = $backgroundImage['invert_colours'];
$headerText = get_field('header_text');

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
    <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
  </div>
<?php endif; ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 text-center">
      <h6><?php $category = get_the_category(); echo $category[0]->name; ?></h6>
      <?php if($headerText): ?>
      <h1><?php echo $headerText; ?></h1>
       <? else: ?>
       <h1><?php the_title(); ?></h1>
       <?php endif; ?>
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
<!-- text -->
            <div class="row justify-content-center my-5">
              <div class="col-md-8">

                <?php the_sub_field('text_block'); ?>

              </div>
            </div>

          <?php  endif;

          if( get_row_layout() == 'image_block' ): ?>
<!-- image -->
          <div class="row justify-content-center my-5"> 
            <div class="col-md-10">
            <?php
							$image = get_sub_field('image');
            if( !empty($image) ):

            // vars
            $url = $image['url'];
            $alt = $image['alt'];

            ?>
              <img class="rounded" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
            <?php endif; ?>

            </div>
          </div>

          <?php endif; 
          if( get_row_layout() == 'video_block' ): ?>
<!-- video -->
          <div class="row justify-content-center my-5"> 
            <div class="col-md-10">
            <?php
							$video = get_sub_field('video_embed_code');
  

            ?>
            <div class="embed-container rounded">
              <?php echo $video ?>
              </div>
            </div>
          </div>
          <?php endif; 
          if( get_row_layout() == 'gallery_block' ): ?>
          <!-- video -->
                    <div class="row justify-content-center my-5"> 
                      <div class="col-md-10">
                      <?php 

$images = get_sub_field('gallery');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

if( $images ): ?>
  <!-- Slider main container -->
  <div class="swiper-container gallery rounded">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper align-items-center">

      <?php foreach( $images as $image ): ?>
        <img class="rounded swiper-slide mb-0" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
      <?php endforeach; ?>

    </div>
      <!-- If we need pagination -->
      <div class="swiper-pagination"></div>
    
      <!-- If we need navigation buttons -->
      <div class="prev"><i class="fal fa-arrow-left"></i></div>
      <div class="next"><i class="fal fa-arrow-right"></i></div>
  </div>

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

<section class="related-posts  pb-5">
  <div class="container">
    <div class="row pt-5 pb-2">
      <div class="col text-center">
        <h2>Related articles</h2>
      </div>
    </div>
    <div class="row justify-content-center">
    <?php
        // Default arguments
        $args = array(
          'posts_per_page' => 3, // How many items to display
          'post__not_in'   => array( get_the_ID() ), // Exclude current post
          'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
        );

        // Check for current post category and add tax_query to the query arguments
        $cats = wp_get_post_terms( get_the_ID(), 'category' );
        $cats_ids = array();
        foreach( $cats as $wpex_related_cat ) {
          $cats_ids[] = $wpex_related_cat->term_id;
        }
        if ( ! empty( $cats_ids ) ) {
          $args['category__in'] = $cats_ids;
        }

        // Query posts
        $wpex_query = new wp_query( $args );

        // Loop through posts
        foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>

          <article class="col-sm-6 col-md-4 text-center blog-tile">

            <a href="<?php the_permalink(); ?>" class="">
              <div class="blog-tile__thumb ">
                <?php
                $backgroundImage = get_field('background_image_background_image');

                if( !empty($backgroundImage) ):

                  // vars
                  $url = $backgroundImage['url'];
                  $alt = $backgroundImage['alt'];

                  $size = '600x400';
                  $thumb = $backgroundImage['sizes'][ $size ];
                  $width = $backgroundImage['sizes'][ $size . '-width' ];
                  $height = $backgroundImage['sizes'][ $size . '-height' ];

                  ?>
                  <div class="background-image-holder ">
                    <img class="" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
                  </div>
                <?php endif; ?>
              </div>
              <h6><?php $category = get_the_category(); echo $category[0]->name; ?></h6>
              <?php $headerText = get_field('header_text'); ?>
              <?php if($headerText): ?>
              <h5><?php echo $headerText; ?></h5>
              <? else: ?>
              <h5><?php the_title(); ?></h5>
              <?php endif; ?>
              
            </a>


          </article>

        <?php
        // End loop
        endforeach;

        // Reset post data
        wp_reset_postdata(); ?>
    </div>
  </div>


</section>

<?php endwhile; // end of the loop. ?>

<?php 
        get_template_part( 'page-templates/blocks/pre-footer-cta' );
        get_footer(); 
      ?>
