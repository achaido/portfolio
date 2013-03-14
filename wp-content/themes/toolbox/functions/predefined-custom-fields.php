<?php
  //---------------------------------
  // Adding extra fields to post screen
  //
  // This is a basic snippet for adding a simple text field to your
  // post write screens. If you want other form elements, just add
  // edit the form part in toolbox_meta_box.
  //---------------------------------

  add_action('admin_init', 'toolbox_add_meta_box');
  add_action('save_post', 'toolbox_save_post');

  function toolbox_add_meta_box() {
    add_meta_box('box_id_here', __('Box title here'), 'toolbox_meta_box', 'post', 'high', 'callback_args');
  }

  function toolbox_meta_box() {
    global $post;
    $custom = get_post_custom($post->ID);
    $custom_field_name = $custom['custom_field_name'][0]; ?>

    <p class="description">Adding a description here is a nice idea.</p>

    <p><label>A label:</label>
    <input type="text" name="custom_field_name" value="<?php echo $custom_field_name; ?>" /></p>
  <?php }

  function toolbox_save_post() {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
      return;

    if (!wp_verify_nonce($_POST['myplugin_noncename'], plugin_basename(__FILE__)))
      return;

    if ('page' == $_POST['post_type']) {
      if (!current_user_can('edit_page', $post_id))
        return;
    } else {
      if (!current_user_can('edit_post', $post_id))
        return;
    }

    global $post;
    update_post_meta($post->ID, 'custom_field_name', $_POST['custom_field_name']);
  }