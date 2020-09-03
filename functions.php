<?php

if ( ! isset( $content_width ) ) $content_width = 960;

function philosophy_theme_setup(){
  load_theme_textdomain('philosophy');
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support( 'automatic-feed-links' );
  add_theme_support('html5', array('search-form', 'comment-list'));
  add_theme_support('post-formats', array('image', 'gallery', 'quote', 'audio', 'video', 'link'));
  add_editor_style("/assets/css/philosophy-style.css");

  add_image_size('home-square',400,400,true);

  register_nav_menu('mainmenu', __('Main Menu', 'philosophy'));
  register_nav_menus(array(
    'footer-left' => __('Footer Left Menu', 'philosophy'),
    'footer-middle' => __('Footer Middle Menu', 'philosophy'),
    'footer-right' => __('Footer Right Menu', 'philosophy'),
  ));
}
add_action('after_setup_theme', 'philosophy_theme_setup');


function philosophy_assets(){
  wp_enqueue_style('fontawesome-css', get_theme_file_uri("/assets/font-awesome/css/font-awesome.min.css"), null);
  wp_enqueue_style('fonts-css', get_theme_file_uri("/assets/css/fonts.css"), null);
  wp_enqueue_style('base-css', get_theme_file_uri("/assets/css/base.css"), null);
  wp_enqueue_style('vendor-css', get_theme_file_uri("/assets/css/vendor.css"), null);
  wp_enqueue_style('main-css', get_theme_file_uri("/assets/css/main.css"), null);
  wp_enqueue_style('philosophy-css', get_stylesheet_uri());

  wp_enqueue_script('modernizr-js', get_theme_file_uri('/assets/js/modernizr.js'), null, 1.0, false);
  wp_enqueue_script('pace-js', get_theme_file_uri('/assets/js/pace.min.js'), null, 1.0, false);
  wp_enqueue_script('plugins-js', get_theme_file_uri('/assets/js/plugins.js'), array('jquery'), 1.0, true);
  if ( is_singular() ) {wp_enqueue_script( "comment-reply" );} 
  wp_enqueue_script('main-js', get_theme_file_uri('/assets/js/main.js'), array('jquery'), 1.0, true);
}
add_action('wp_enqueue_scripts', 'philosophy_assets');


// Blog Pagination
function philosophy_pagination(){

  global $wp_query;
  $pagination = paginate_links(
    array(
      'current'=>max(1,get_query_var('paged')),
      'total' =>  $wp_query->max_num_pages,
      'type' => 'list'
    )
  );
  $pagination = str_replace('page-numbers','pgn__num',$pagination);
  $pagination = str_replace("<ul class='pgn__num'>",'<ul>',$pagination);
  $pagination = str_replace('next','pgn__next',$pagination);
  $pagination = str_replace('prev','pgn__prev',$pagination);
  echo wp_kses_post($pagination);
}

// Remove <p> in the Category Description
remove_action('term_description', 'wpautop');


function philosophy_widgets(){
  register_sidebar( array(
    'name'          => __( 'About Us Page', 'philosophy' ),
    'id'            => 'about_us',
    'description'   => __( 'Widgets in this area will be shown on about us page.', 'philosophy' ),
    'before_widget' => '<div id="%1$s" class="col-block %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="quarter-top-margin">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Before Footer Section', 'philosophy' ),
    'id'            => 'about_us_footer',
    'description'   => __( 'Widgets in this area will be shown on before footer about info section.', 'philosophy' ),
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Section', 'philosophy' ),
    'id'            => 'footer',
    'description'   => __( 'Widgets in this area will be shown on footer section.', 'philosophy' ),
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Copyright', 'philosophy' ),
    'id'            => 'copyright',
    'description'   => __( 'Widgets in this area will be shown on footer Copyright section.', 'philosophy' ),
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Header Social Section', 'philosophy' ),
    'id'            => 'header-section',
    'description'   => __( 'Widgets in this area will be shown on header section.', 'philosophy' ),
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ) );
}
add_action('widgets_init', 'philosophy_widgets');


// Search Form
function philosophy_search() {
  $homedir = site_url('/');
  $lebel = __('Search for:', 'philosophy');
  $button = __('Search', 'philosophy');
  $seachForm = <<<FORM
  <form role="search" method="get" class="header__search-form" action="{$homedir}">
  <label>
      <span class="hide-content">{$lebel}</span>
      <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="{$lebel}" autocomplete="off">
  </label>
  <input type="submit" class="search-submit" value="{$button}">
</form>
FORM;
  return $seachForm;
}
add_filter('get_search_form', 'philosophy_search');
