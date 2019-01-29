<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

get_header();


?>

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
		<h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.',
							'understrap' ); ?></h1>
	
		<p><?php esc_html_e( 'It looks like nothing was found at this location.',
							'understrap' ); ?></p>
      <hr class="line mt-5" />
    </div>
  </div>
</div>

<?php get_template_part( 'page-templates/blocks/overlap' ); ?>

</section>
<section class="related-posts  pb-5">
  <div class="container">

    <div class="row justify-content-center pt-5">
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
              <h5><?php the_title(); ?></h5>
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


<?php get_footer(); ?>
