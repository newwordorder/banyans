<?php
/**
 * Search results partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( sprintf( '<h3 class="entry-title mb-0"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h3><hr />' ); ?>

	</header><!-- .entry-header -->


</article><!-- #post-## -->
