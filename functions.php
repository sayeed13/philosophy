<?php

function philosophy_theme_setup(){
  load_theme_textdomain('philosophy');
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('html5', array('search-form', 'comment-list'));
  add_theme_support('post-formats', array('image', 'gallery', 'quote', 'audio', 'video', 'link'));
  add_editor_style("/assets/css/philosophy-style.css");

  add_image_size('home-square',400,400,true);

  register_nav_menu('mainmenu', __('Main Menu', 'philosophy'));
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
  echo $pagination;
}

// Remove <p> in the Category Description
remove_action('term_description', 'wpautop');
