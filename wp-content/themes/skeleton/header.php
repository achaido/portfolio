<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>

  <title><?php toolbox_title_tag(); ?></title>

  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="wp-content/themes/skeleton/webfonts/ss-social.css" />

  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link rel="icon" type="image/png" href="myicon.png"> <?php /* Standard favicon */ ?>
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_bloginfo('template_directory'); ?>/img/icons/apple-touch-icon-144x144-precomposed.png"> <?php /* For third-generation iPad with high-resolution Retina display */ ?>
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_bloginfo('template_directory'); ?>/img/icons/apple-touch-icon-114x114-precomposed.png"> <?php /* For iPhone with high-resolution Retina display */ ?>
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_bloginfo('template_directory'); ?>/img/icons/apple-touch-icon-72x72-precomposed.png"> <?php /* For first- and second-generation iPad */ ?>
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_bloginfo('template_directory'); ?>/img/icons/apple-touch-icon-precomposed.png"> <?php /* ?> For non-Retina iPhone, iPod Touch, and Android 2.1+ devices */ ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php if ( function_exists( 'get_the_image' ) ) get_the_image( array( 'size' => 'large' )); ?>

  <header>
    <img class="avatar" src="http://www.gravatar.com/avatar/ca94a942a00706ee09b6620eaa542033" />
    <h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
  </header>

  <section>