<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

?>

<footer class="footer">
	<div class="container footer__top text-center">

		<div class="row">
			<div class="col-sm-12">
				<a href="<?php echo get_home_url(); ?>" id="" class="footer__logo">
					<img class="footer__logo" src="<?php bloginfo('template_directory'); ?>/img/logo--dark.svg" alt="Logo">
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<h5>The Banyans</h5>
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'footer-corporate',
						'container_class' => 'footer-menu',
						'container_id'    => '',
						'menu_class'      => 'menu',
						'fallback_cb'     => '',
						'menu_id'         => 'footer__corporate',
					)
				); ?>
			</div>
			<div class="col-sm-4">
				<h5>How we help</h5>
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'footer-help',
						'container_class' => 'footer-menu',
						'container_id'    => '',
						'menu_class'      => 'menu',
						'fallback_cb'     => '',
						'menu_id'         => 'footer__corporate',
					)
				); ?>
			</div>
			<div class="col-sm-4">
				<h5>Connect</h5>
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'footer-contact',
						'container_class' => 'footer-menu',
						'container_id'    => '',
						'menu_class'      => 'menu',
						'fallback_cb'     => '',
						'menu_id'         => 'footer__corporate',
					)
				); ?>
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'header-social',
						'container_class' => 'footer-social',
						'container_id'    => '',
						'menu_class'      => 'menu',
						'fallback_cb'     => '',
						'menu_id'         => 'footer__social',
					)
				); ?>
			</div>
		</div>
	</div>
		
	<div class="container footer__bottom">
		<div class="row">
			<div class="col-sm-6">
					<p>© Copyright The Banyans  <a href="<?php echo get_home_url(); ?>/privacy-policy">Privacy Policy</a></p>
			</div>

			<div class="col-sm-6 makers-mark">
				<p>Site by <a href="#" target="_blank">NWO</a></p>
			</div>

		</div>
	</div>
</footer>





<?php wp_footer(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/flickity.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/fontawesome-all.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/parallax.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/smooth-scroll.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/ytplayer.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/aos.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/TimelineMax.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/TweenMax.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/CustomEase.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/swiper.js"></script>

    

<script>
	AOS.init();
</script>

<script>
  var mySwiper = new Swiper ('.blog-carousel', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
      nextEl: '.next',
      prevEl: '.prev',
    },

  })
  </script>

<script>
  var mySwiper = new Swiper ('.gallery', {
    // Optional parameters
	direction: 'horizontal',
    loop: true,

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
      nextEl: '.next',
      prevEl: '.prev',
    },

  })
  </script>

</body>

</html>
