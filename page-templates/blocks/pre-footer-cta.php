<?php // PRE-FOOTER CTA BLOCK

$preFooterSetup = get_field('pre-footer_cta','options');

  $space = $preFooterSetup['space'];
  $background = $preFooterSetup['block_background'];
  $flipLayout = $preFooterSetup['flip_layout'];
  $parallelogram = $preFooterSetup['parallelogram'];

$preFooterBackgroundImage = $preFooterSetup['background_image'];

  $image = $preFooterBackgroundImage['background_image'];
  $imageOverlay = $preFooterBackgroundImage['image_overlay'];
  $backgroundEffect = $preFooterBackgroundImage['background_effect'];
  $invertColours = $preFooterBackgroundImage['invert_colours'];
  $overlayColor = $preFooterBackgroundImage['overlay_color'];

$layout = $preFooterSetup['layout'];
$text = $preFooterSetup['text_block'];

$spaceBelow = $preFooterSetup['space_below'];


?>

<section id="pre-footer"
  class="bg--<?php echo $background ?> space--<?php echo $space ?> bg-effect--<?php echo $backgroundEffect ?> <?php if( $background == 'image' ): echo 'imagebg'; endif; ?> <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?><?php if($parallelogram == 'yes'): ?>parallelogram<?php endif; ?>"
  <?php if( $background == 'image' ): ?>
    data-overlay="<?php echo $imageOverlay ?>"
  <?php endif; ?>
>
<?php if( $background == 'image' ):?>

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




<?php endif; ?>

  <div class="container space-below--<?php echo $spaceBelow ?>">

      <div class="row align-items-center justify-content-center">


          <?php if( $layout == 'horizontal' ): ?>

            <div class="col-md-8 cta__text">
                <?php echo $text ?>

            </div>
            <div class="col-md-4 cta__buttons">
            <?php if( get_field('include_buttons','options') == 'yes' ): ?>

              <?php if( have_rows('buttons','options') ): ?>
              <div class="buttons">
                <?php while( have_rows('buttons','options') ): the_row();
                  $buttonText = get_sub_field('button_text','options');
                  $linkType = get_sub_field('link_type','options');
                  $url = get_sub_field('url','options');
                  $pageUrl = get_sub_field('page_url','options');
                  $buttonStyle = get_sub_field('button_style','options');
                  ?>

                  <a href="<?php if($linkType == "page"): echo $pageUrl; endif; ?><?php if($linkType == "url"):  echo $url; endif; ?>" class="btn btn--<?php echo $buttonStyle ?>"><?php if($buttonStyle == "link"): echo '<i class="far fa-arrow-circle-right"></i>'; endif; ?><?php if($buttonStyle == "outline"): echo '<span>'; endif; ?><?php echo $buttonText ?><?php if($buttonStyle == "outline"): echo '</span>'; endif; ?> </a>

                <?php endwhile; ?>
              </div>
              <?php endif; ?>
            <?php endif; ?>
            </div>

          <?php endif; // end horizontal ?>

          <?php if( $layout == 'vertical' ): ?>

            <div class="col-md-8 text-center">
                <?php echo $text ?>

                <?php if( get_field('include_buttons','options') == 'yes' ): ?>

                      <?php if( have_rows('buttons','options') ): ?>
                      <div class="buttons">
                        <?php while( have_rows('buttons','options') ): the_row();
                          $buttonText = get_sub_field('button_text','options');
                          $linkType = get_sub_field('link_type','options');
                          $url = get_sub_field('url','options');
                          $pageUrl = get_sub_field('page_url','options');
                          $buttonStyle = get_sub_field('button_style','options');
                          ?>

                          <a href="<?php if($linkType == "page"): echo $pageUrl; endif; ?><?php if($linkType == "url"):  echo $url; endif; ?>" class="btn btn--<?php echo $buttonStyle ?>"><?php if($buttonStyle == "link"): echo '<i class="far fa-arrow-circle-right"></i>'; endif; ?><?php if($buttonStyle == "outline"): echo '<span>'; endif; ?><?php echo $buttonText ?><?php if($buttonStyle == "outline"): echo '</span>'; endif; ?> </a>

                        <?php endwhile; ?>
                      </div>
                      <?php endif; ?>

                <?php endif; ?>
            </div>

          <?php endif; // end vertical ?>

      </div>
    </div>

</section>