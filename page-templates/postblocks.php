<?php
  // check if the repeater field has rows of data
if( have_rows('posts_blocks') ) {
  // loop through the rows of data
  echo '<section>';

  while ( have_rows('posts_blocks') ) { the_row();
      // loop through the rows of data
      echo '<div class="p-4">'; ?>

<?php // TEXT BLOCK

if( get_row_layout() == 'text_block' ):

  $textBlock = get_sub_field('text_block');

?>



<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

        <?php echo $textBlock ?>

    </div>
  </div>
</div>


<?php endif;

?>
      


      <?php  echo '</div>';
  }
  echo '</section>';

}



?>



