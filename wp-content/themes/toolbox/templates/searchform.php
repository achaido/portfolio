<?php
  if($_GET['s']) {
    $searchVal = $_GET['s'];
  }
?>

<form class="searchform" action="<?php bloginfo('url'); ?>" method="get">
  <label for="s">Search</label>
  <input type="text" value="<?php echo($searchVal); ?>" name="s" placeholder="Search <?php bloginfo('title') ?>" />
  <input type="submit" value="Ok" class="searchgo" />
</form>