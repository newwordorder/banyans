<?php 
function misha_my_load_more_scripts() {
 
	global $wp_query; 
 
	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');
 
	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );

function misha_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args ); ?>
 
	<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>


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


				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>
<?php	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}