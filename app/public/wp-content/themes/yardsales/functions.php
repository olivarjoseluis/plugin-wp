<?php

function storeAssets()
{
  wp_register_style("google_fonts", "https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700", array(), false, 'all');
  wp_register_style("google_fonts_2", "https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;700&display=swap", array(), false, 'all');
  wp_register_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css", array(), "5-1", 'all');

  wp_enqueue_style("styles", get_template_directory_uri() . "/assets/css/style.css", array("google_fonts", "bootstrap"));

  wp_enqueue_script("yard_sale_js", get_template_directory_uri() . "/assets/js/script.js");
}

add_action("wp_enqueue_scripts", "storeAssets");


function storeThemeSupports()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support(
    'custom-logo',
    array(
      "width" => 170,
      "height" => 35,
      "flex-width" => true,
      "flex-height" => true,
    )
  );
}

add_action("after_setup_theme", "storeThemeSupports");

function storeAddMenus()
{
  register_nav_menus(
    array(
      'primary-menu' => "Menú principal",
      'menu-responsive' => "Menú responsive"
    )
  );
}

add_action("after_setup_theme", "storeAddMenus");

function storeAddSidebar()
{
  register_sidebar(
    array(
      'name' => 'Pie de página',
      'id' => 'pie_pagina',
      'before_widget' => '',
      'after_widget' => '',
    )
  );
}

add_action("widgets_init", "storeAddSidebar");


function storeAddCustomPostType()
{
  $labels = array(
    'name' => 'Producto',
    'singular_name' => 'Producto',
    'all_items' => 'Todos los productos',
    'add_new' => 'Añadir producto'
  );

  $args = array(
    'labels'             => $labels,
    'description'        => 'Productos para listar en un catálogos.',
    'public'             => true,
    'publicly_queryable' => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'producto'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'supports'           => array('title', 'editor', 'author', 'thumbnail'),
    'taxonomies'         => array('category'),
    'show_in_rest'       => true,
    'menu_icon'          => 'dashicons-cart'
  );

  register_post_type('product', $args);
}

add_action("init", "storeAddCustomPostType");


function storeSigninMenu()
{
  $currentUser = wp_get_current_user();

  $msg = is_user_logged_in() ? $currentUser->user_email : "Sign in";
  echo $msg;
}

add_action("storeSignin", "storeSigninMenu");
