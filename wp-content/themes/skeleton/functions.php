<?php

  //---------------------------------
  // Javascripts & CSS
  //
  // I find this is a much cleaner way to add styles and scripts
  // than adding them in the header. You might disagree, and that's
  // fine with me.
  //---------------------------------

  function toolbox_add_css() {
    if(!is_admin()) {
      wp_enqueue_style('base-reset', get_bloginfo('template_directory') . '/css/base-reset.css', false, 'screen');
      wp_enqueue_style('base-improvements', get_bloginfo('template_directory') . '/css/base-improvements.css', false, 'screen');
      wp_enqueue_style('layout', get_bloginfo('template_directory') . '/css/layout.css', false, 'screen');
      wp_enqueue_style('toolbox', get_bloginfo('stylesheet_url'), false, 'screen');
    }
  }

  function toolbox_add_js() {
    if(!is_admin()) {
      wp_enqueue_script('utilities', get_bloginfo('template_directory') . '/js/ui.js', array('jquery'));
    }
  }

  add_action('wp_print_styles', 'toolbox_add_css');
  add_action('wp_enqueue_scripts', 'toolbox_add_js');


  //---------------------------------
  // $content_width
  //
  // This variable is a bit silly, but mandatory if you ever want to
  // publish your theme on wordpress.org. Basically, it should be the
  // width of your main content area to prevent images and other media
  // from becoming too big. I personally feel it's more in the way
  // than good, even though I understand the intentions behind it. It's
  // just outdated thinking, what with todays Media Queries and all that jazz.
  //
  // My advice: set it to something pretty large that suits your theme. Take
  // fluid/non fluid layout and media queries into account, and make sure your 
  // featured image sizes as well as CSS can handle large images if need be.
  //---------------------------------

  if (!isset($content_width)) {
    $content_width = 960;
  }


  //---------------------------------
  // toolbox_title_tag()
  //
  // A function to generate decent page titles. Based
  // on the one in twentyeleven.
  //---------------------------------

  function toolbox_title_tag() {
    global $page, $paged;
    $output = wp_title('|', false, 'right');
    $output .= get_bloginfo('name');

    $site_description = get_bloginfo( 'description', 'display' );
    if($site_description && (is_home() || is_front_page())) {
      $output .= ' | ' . $site_description;
    }

    echo $output;
  }


  //---------------------------------
  // Toolbox Theme Setup
  //
  // Runs all theme setup bits on the after_setup_theme hook. Contains:
  //
  // add_theme_support()
  // - Thumbnails
  // - Automatic feed links
  //
  // register_nav_menu()
  // Registers the menu locations. You have to
  // create the menu yourself from the interface.
  // Rename it to something pretty and understandable.
  //
  // If you want to use set_post_thumbnail_size(), add_image_size(),
  // custom header images, background color or other similar functions
  // you should add them here as well.
  //---------------------------------

  add_action('after_setup_theme', 'toolbox_after_setup_theme');

  function toolbox_after_setup_theme() {
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    register_nav_menu('header-menu', __('Header menu'));
  }


  //---------------------------------
  // Sidebars
  //
  // Call them in your theme with the following function: 
  // dynamic_sidebar('[id]');
  // Don't forget to write awesomely helpful descriptions.
  //---------------------------------

  add_action('widgets_init', 'toolbox_widgets_init');

  function toolbox_widgets_init() {
    register_sidebar(array(
      'name' => 'Name1',
      'description' => 'Name1 is displayed XX and used YY. It\'s good for ZZ.',
      'id' => 'name-1',
      'before_widget' => '<li id="%1$s" class="widget %2$s wysiwyg">',
      'after_widget'  => '</li>')
    );
    register_sidebar(array(
      'name' => 'Name2',
      'description' => 'Name2 is displayed XX and used YY. It\'s good for ZZ.',
      'id' => 'name-2',
      'before_widget' => '<li id="%1$s" class="widget %2$s wysiwyg">',
      'after_widget'  => '</li>')
    );
  }


  /*
Plugin Name: Image P tag remover
Description: Plugin to remove p tags from around images and iframes in content outputting, after WP autop filter has added them. (oh the irony)
Version: 1.1
Author: Fublo Ltd
Author URI: http://blog.fublo.net/2011/05/wordpress-p-tag-removal/
*/

function filter_ptags_on_images($content)
{
    // do a regular expression replace...
    // find all p tags that have just
    // <p>maybe some white space<img all stuff up to /> then maybe whitespace </p>
    // replace it with just the image tag...
    $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    // now pass that through and do the same for iframes...
    return preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '\1', $content);
}

// we want it to be run after the autop stuff... 10 is default.
add_filter('the_content', 'filter_ptags_on_images');

?>