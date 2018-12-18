<?php // TEXT BLOCK

if( get_row_layout() == 'post_text_block' ):

  $textBlock = get_sub_field('text_block');
  $spaceBelow = get_sub_field('space_below');

  ?>



<div class="container space-below--<?php echo $spaceBelow ?> my-3">
  <div class="row justify-content-center">
    <div class="col-md-8">

        <?php echo $textBlock ?>

    </div>
  </div>
</div>


<?php endif;

?>
