<?php // VIDEO BLOCK

if( get_row_layout() == 'timeline' ):


  ?>
<?php if( have_rows('timeline') ): ?>
    <div class="container">
        <?php while( have_rows('timeline') ): the_row();

          $text = get_sub_field('text');
          $image = get_sub_field('image');
          $title = get_sub_field('title');

        ?>
        <div class="row timeline">
            <div class="col-md-6 timeline__col timeline__image">
            <?php 
              if( !empty($image) ):

                // vars
                $url = $image['url'];
                $alt = $image['alt'];

                ?>
                <img class="rounded feature-column__image" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
              <?php endif; ?>
            </div>
            <div class="col-md-6 timeline__col timeline__text">
                <div class="timeline__text-inner">
                    <h6 class="timeline__title"><?php echo $title; ?></h6>
                    <?php echo $text; ?>
                </div>
            </div>
        </div>

        <?php endwhile; ?>
        </div>
        <!-- end of .container-->
    <?php endif; // end timeline repeater ?>
<?php endif; // end timeline block ?>