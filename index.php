<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();

?>

<section id="sub-header" class="space--none bg--light page-header--blog">
<div class="blog-carousel">
<div class="swiper-wrapper">


<?php
	$args = array(
		'posts_per_page' => 3,
		'meta_key' => 'meta-checkbox',
		'meta_value' => 'yes'
	);

	$featured = new WP_Query($args);

if ($featured->have_posts()):?>

	<?php while ($featured->have_posts() ) : $featured->the_post();

		$image = get_field('background_image');
		$bg_image = $image['background_image'];
	?>
	<div class="swiper-slide bg--dark " data-overlay="5" style="width:100%; height:100%">
		<div class="background-image-holder">
			<img src="<?php echo $bg_image['url']; ?>" />
		</div>
		<div style="width:100%;">
			<div class="container" style="padding: 200px 15px 150px; height:100%; z-index:5 !important;">
				<div class="row justify-content-center">
					<div class="col-md-8 text-center">
						<h1 class="mb-4"><?php the_title(); ?></h1>
						<a class="btn btn--outline" href="<?php the_permalink(); ?>"><span>Read</span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endwhile; ?>

<?php endif; ?>
</div>
	<div class="prev"><i class="fal fa-arrow-left"></i></div>
	<div class="next"><i class="fal fa-arrow-right"></i></div>
</div>
<?php get_template_part( 'page-templates/blocks/overlap' ); ?>
</section>





<section class="space--md bg--light">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-10 text-center">

				<?php
				$categories = get_categories( array(
						'orderby' => 'name',
						'order'   => 'ASC'
				) );
				echo '<div class="blog-categories">';
				?><a href="<? echo get_site_url(); ?>/blog"><h6>All</h6></a>
				<?php

				foreach( $categories as $category ) {
						$category_link = sprintf(
								'<a class="blog-categories__link" href="%1$s" alt="%2$s">%3$s</a>',
								esc_url( get_category_link( $category->term_id ) ),
								esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
								esc_html( $category->name )
						);

						echo '<h6>' . sprintf( esc_html__( '%s', 'textdomain' ), $category_link ) . '</h6> ';

				}
				echo '</div>';
				?>

			</div>
		</div>
	</div>


	<div class="container" id="main" tabindex="-1">


		<?php /* Start the Loop */ ?>

		<div class="row">

			<?php while ( have_posts() ) : the_post(); ?>
				<article class="col-sm-6 col-md-4 blog-tile">
					<div class="blog-tile--inner">
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
								<div class="background-image-holder " style="background: url('<?php echo $thumb; ?>'); opacity: 1;">
									<img class="" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
								</div>
							<?php endif; ?>
						</div>
						<div class="blog-tile__details">
							<h6><?php $category_detail = get_the_category();
							foreach($category_detail as $cd){
								echo $cd->cat_name;
								}
							?>
							</h6>
							<h5><?php the_title(); ?></h5>

						</div>
					</a>
							</div>

				</article>

			<?php endwhile; ?>


		</div>






			<!-- The pagination component -->
<div class="row justify-content-center">
			<?php global $wp_query; // you can remove this line if everything works for you

			// don't display the button if there are not enough posts
			if (  $wp_query->max_num_pages > 1 )
				echo '<div class="btn btn--outline loadmore m-auto">More posts</div>';
			?>

</div>
</div><!-- Container end -->

</section>

<?php 
        get_template_part( 'page-templates/blocks/pre-footer-cta' );

get_footer(); ?>
