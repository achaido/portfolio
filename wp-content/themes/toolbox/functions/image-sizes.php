<?php
  //---------------------------------
  // Image sizes
  //
  // Adding some image sizes to be used for featured images.
  // It's a good idea to hardcode them like this if you
  // want to be sure they fit the layout.
  //
  // The first two parameters set the image width and height in pixels.
  // The third notes one of two scaling modes:
  //
  // True = scale one of the sides and crops the other.
  // False = scale one of the sides and adjust the other to the same aspect ratio.
  //
  // Please note:
  // due to WordPress limitations sizes are only generated
  // for new images - old images needs to be re-uploaded or
  // remade using the following plugin:
  // http://wordpress.org/extend/plugins/regenerate-thumbnails/
  //---------------------------------

  add_image_size('archive-featured-image', 240, 240, true); 
  add_image_size('single-post-featured-image', 800, 700, false); 