<?php
  //---------------------------------
  // Widget
  //
  // This is a bare-bones widget template. It outputs only the title, but is complete with
  // settings and so on. Remember to do a search & replace for 'toolboxBlankWidget' (classname and function names).
  // Besides that, have fun & fill in the blanks yourself :)
  //---------------------------------

  class toolboxBlankWidget extends WP_Widget {

    function toolboxBlankWidget() {
      $widget_ops = array(
        'classname' => 'toolboxBlankWidget',
        'description' => __('This is the description displayed below the widget box on the widget selection screen.')
      );
      $control_ops = array('width' => 100, 'height' => 100);
      $this->WP_Widget('toolboxBlankWidget', __('A blank widget'), $widget_ops, $control_ops);
    }

   // Displays the widget
    function widget($args, $instance) {
      echo $args['before_widget'];
      if($instance['title'] != null) :
        echo $args['before_title'] . $instance['title'] . $args['after_title'];
      endif;
      echo $args['after_widget'];
    }

    // Saves the widget settings
    function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['title'] = strip_tags(stripslashes($new_instance['title']));
      return $instance;
    }

    // Form for admin
    function form($instance) {
      global $wpdb;
      $title = htmlspecialchars($instance['title']); ?>
      <p>
        <label for="<?php echo $this->get_field_name('title'); ?>"><?php echo __('Title:'); ?></label><br>
        <input 
          id="<?php echo $this->get_field_id('title') ?>"
          name="<?php echo $this->get_field_name('title'); ?>"
          type="text"
          value="<?php echo $title; ?>"
        />
      </p>
    <?php }
  }

  // Register widget
  function toolboxBlankWidgetInit() {
    register_widget('toolboxBlankWidget');
  }

  add_action('widgets_init', 'toolboxBlankWidgetInit');