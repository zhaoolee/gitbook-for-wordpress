<?php
// 设置主题默认特性
function my_theme_setup()
{
  // 为主题添加特色图像支持
  add_theme_support('post-thumbnails');

  // 为文章和页面添加自定义标题支持
  add_theme_support('title-tag');

  // 注册导航菜单
  register_nav_menus(
    array(
      'primary' => 'Primary Menu',
    )
  );

  // 为主题添加HTML5支持
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );

  // 添加对Gutenberg编辑器的宽度支持
  add_theme_support('align-wide');
}
add_action('after_setup_theme', 'my_theme_setup');

// 将样式表和脚本加入到队列中
function my_theme_enqueue_scripts()
{
  // 注册和加载主样式表
  wp_enqueue_style('my-theme-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

  // 注册和加载自定义脚本（如有需要）
  // wp_enqueue_script('my-theme-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

// 注册小工具区域
function my_theme_widgets_init()
{
  register_sidebar(
    array(
      'name' => 'Primary Sidebar',
      'id' => 'primary-sidebar',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    )
  );

  register_sidebar(
    array(
      'name' => 'Footer Widgets',
      'id' => 'footer-widgets',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    )
  );
}
add_action('widgets_init', 'my_theme_widgets_init');

// 添加BootStrap

function mytheme_enqueue_scripts()
{
  // 注册Bootstrap CSS文件
  wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.3.0');
  // 将Bootstrap CSS文件加入队列
  wp_enqueue_style('bootstrap');

  // 注册Bootstrap JavaScript文件，并添加jQuery作为依赖
  wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '5.3.0', true);
  // 将Bootstrap JavaScript文件加入队列
  wp_enqueue_script('bootstrap');

  // 注册自定义脚本
  wp_register_script('custom-scripts', get_template_directory_uri() . '/js/custom-scroll-sidebar-scripts.js', array('jquery'), '1.0.0', true);

  // 将jQuery和自定义脚本添加到队列
  wp_enqueue_script('jquery');
  wp_enqueue_script('custom-scripts');
  // 注册search-form.js
  wp_register_script('search-form', get_template_directory_uri() . '/search-form.js', array(), '1.0', true);
  wp_enqueue_script('search-form');
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');

// 创建个性设置自定义字段用于保存备案信息

function my_customizer_settings($wp_customize) {
  // 添加自定义部分
  $wp_customize->add_section('my_custom_section', array(
      'title' => '《求和!李姐万岁!》个性设置',
      'priority' => 30,
  ));

  // 添加自定义设置
  $wp_customize->add_setting('beian_info', array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
  ));

  // 添加自定义控件
  $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize,
      'beian_info_control',
      array(
          'label' => '备案信息',
          'section' => 'my_custom_section',
          'settings' => 'beian_info',
          'type' => 'text',
      )
  ));
}
add_action('customize_register', 'my_customizer_settings');


class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
      $url = $item->url;
      $title = $item->title;
      $output .= "<a href='$url'><li class='list-group-item'>$title</li></a>";
  }
}

// 注册菜单位置
function register_my_menus() {
  register_nav_menus(array(
      'primary' => __('Gitbook Menu', 'github-com-zhaoolee-gitbook-for-wordpress'),
  ));
}

add_action('init', 'register_my_menus');


function is_menu_empty($location) {
  $menu_locations = get_nav_menu_locations();
  if (isset($menu_locations[$location])) {
      $menu = wp_get_nav_menu_object($menu_locations[$location]);
      if ($menu && !empty($menu->term_id)) {
          $menu_items = wp_get_nav_menu_items($menu->term_id);
          return empty($menu_items);
      }
  }
  return true;
}


function github_com_zhaoolee_gitbook_for_wordpress_widgets_init() {
  register_sidebar( array(
      'name'          => '《求和!李姐万岁!》主题自定义小部件',
      'id'            => 'right-sidebar',
      'before_widget' => '<div class="widget">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'github_com_zhaoolee_gitbook_for_wordpress_widgets_init' );
