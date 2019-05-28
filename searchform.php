<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package understrap
 */

?>


<form class="d-flex" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
<label class="d-none" for="s">Search</label>			
<input class="field form-control mr-2" id="s" name="s" type="text"
					placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>" value="<?php the_search_query(); ?>">
			<input class="btn btn--solid" id="searchsubmit" name="submit" type="submit"
					value="<?php esc_attr_e( 'Search', 'understrap' ); ?>">
	</form>
