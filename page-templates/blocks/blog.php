<?php // BLOG POSTS

if( get_row_layout() == 'blog_posts' ):

  $includePosts = get_sub_field('include_posts');
  $posts = get_sub_field('select_posts');

?>

<?php if( $includePosts == 'latest' ): ?>

<div class="container">
<div class="row">

  <?php
           // the query
           $the_query = new WP_Query( array(
              'posts_per_page' => 3,
           ));
        ?>

			<?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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

			<?php endwhile;

          // reset post data
          wp_reset_postdata();

      ?>
    <?php endif; ?>
			

    </div>
 </div> 
 
 <?php endif; ?>
 <?php if( $includePosts == 'select' ): ?>
  <div class="container">
    <div class="row">
      <?php if( $posts ): ?>
        <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
          <?php setup_postdata($post); ?>

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

                <h3><?php the_title(); ?></h3>
                <a class="link" href="<?php the_permalink(); ?>">Read</a>
              </a>


            </article>

          <?php endforeach; ?>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
<?php endif; // end blog posts block ?>