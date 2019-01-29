<?php // TEXT & IMAGE BLOCK

if( get_row_layout() == 'text_image' ):



$media = get_sub_field('media');

$text = get_sub_field('text_block');

$image = get_sub_field('image');

$videoEmbedCode = get_sub_field('video_embed_code');
$videoCoverImage = get_sub_field('video_cover_image');

$layout = get_sub_field('layout');
$flipLayout = get_sub_field('flip_layout');
$spaceBelow = get_sub_field('space_below');



?>

  <div class="container space-below--<?php echo $spaceBelow ?>">

      <div class="row flippable <?php if( $flipLayout == 'yes' ): echo 'flippable--flip'; endif; ?>">
          <div class=" flippable__text <?php if( $layout == '1/3' ): echo 'col-md-8'; endif; ?> <?php if( $layout == '1/2' ): echo 'col-md-6'; endif; ?> <?php if( $layout == '2/3' ): echo 'col-md-4'; endif; ?>">
              <?php echo $text ?>
              <?php get_template_part( 'page-templates/blocks/block-partials/buttons' ); ?>
          </div>
          <div class="<?php if( $layout == '1/3' ): echo 'col-md-4'; endif; ?> <?php if( $layout == '1/2' ): echo 'col-md-6'; endif; ?> <?php if( $layout == '2/3' ): echo 'col-md-8'; endif; ?> flippable__image">

            <?php if( $media == 'image' ): ?>
              <?php if( !empty($image) ):

                // vars
                $url = $image['url'];
                $alt = $image['alt'];

               ?>
                <img class="rounded" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
              <?php endif; //end $image ?>

            <?php endif; //end $media ?>

            <?php if( $media == 'gallery' ): ?>

            <?php 

              $images = get_sub_field('gallery');
              $size = 'full';

              if( $images ): ?>
              
              
                <!-- Slider main container -->
                <div class="swiper-container gallery">
                  <!-- Additional required wrapper -->
                  
                  <div class="swiper-wrapper align-items-center">

                    <?php foreach( $images as $image ): ?>
                    
                      <img class="swiper-slide mb-0" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <?php endforeach; ?>
            
                  </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="prev"><i class="fal fa-arrow-left"></i></div>
	                  <div class="next"><i class="fal fa-arrow-right"></i></div>
                </div>
   
            <?php endif; ?>

            <?php endif; //end $media ?>

            <?php if( $media == 'video' ): ?>

                <div class="embed-container rounded">
              	   <?php echo $videoEmbedCode; ?>
                </div>

            <?php endif; //end $media ?>
          </div>
      </div>
    </div>

<?php endif; //end text_image row

?>
