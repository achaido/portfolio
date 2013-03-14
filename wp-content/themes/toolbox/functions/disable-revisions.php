<?php
  //---------------------------------
  // To disable the revisions feature, copy and paste the
  // following into wp-config.php.
  //
  // Why would you want to do this? There are two main reasons:
  // 1. Performance. Revisions are saved as a separate post in
  //    the database. This makes queries on large sites much slower.
  // 2. Usability. As Wordpress adds more and more features, it's
  //    not a bad idea to keep the complexity of the interface down
  //    to a minimum.
  //---------------------------------

  define('WP_POST_REVISIONS', false);