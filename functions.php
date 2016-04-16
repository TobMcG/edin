<?php

  
  /*  
  ** Custom stuff...
  */  
  
  
  if (class_exists('MultiPostThumbnails')) {
      new MultiPostThumbnails(
          array(
              'label' => 'Secondary Image',
              'id' => 'secondary-image',
              'post_type' => 'page'
          )
      );
  }

?>
