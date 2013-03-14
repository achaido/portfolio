<?php

  //---------------------------------
  // toolbox_archive_title()
  //
  // Generates a proper archive title if we need one.
  // Easy to manipulate - just edit $prepend or $append in
  // your preferred case.
  //---------------------------------

  function toolbox_archive_title() {
    if (is_search()) {
      $prepend = __('Search', 'toolbox') . ':';
      $append = $_GET['s'];
    } else if (is_archive()) {
      $prepend = __('Archive:', 'toolbox') . ':';
      if (is_day()) {
        $append = get_the_date();
      } else if (is_month()) {
        $append = get_the_date('F Y');
      } else if (is_year()) {
        $append = get_the_date('Y');
      } else if (is_category() || is_tag()) {
        $append = single_cat_title('', false);
      } else if (is_author()) {
        $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
        $prepend = __('Author', 'toolbox') . ':';
        $append = $curauth->display_name;
      } else if (is_tax()) {
        global $wp_query;
        $append = $wp_query->queried_object->name;
      }
    }
    if ($prepend || $append) { ?>
      <h1 class="archive-title"><?php if($prepend) { echo $prepend . ' '; } echo $append; ?></h1>
    <?php }
  }