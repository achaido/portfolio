<?php
  //---------------------------------
  // toolbox_prev_next_links()
  //
  // Displays previous and next links if we're on an archive page.
  //---------------------------------

  function toolbox_prev_next_links() {
    if (get_previous_posts_link() || get_next_posts_link())  { ?>
      <div class="prev-next">
        <?php if (get_previous_posts_link()) { ?>
          <div class="newer"><?php previous_posts_link('Nyare inlägg &raquo;') ?></div>
        <?php }
        if (get_next_posts_link()) { ?>
          <div class="older"><?php next_posts_link('&laquo; Äldre inlägg','') ?></div>
        <?php } ?>
      </div>
    <?php }
  }