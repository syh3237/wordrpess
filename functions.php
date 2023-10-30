<?php

if ( ! function_exists( 'supernormal_setup' ) ) :

// 기본 세팅 
function supernormal_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'post-thumbnail-img', 345 );
	
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
}
endif; // supernormal_setup
add_action( 'after_setup_theme', 'supernormal_setup' );


function supernormal_style_sheet() {
    wp_enqueue_style( 'supernormal-style', get_stylesheet_directory_uri() . '/style.css' );
    // swiper cdn
    wp_enqueue_style( 'swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css' );
    // wp_enqueue_style( 'supernormal-style', get_stylesheet_directory_uri() . '/style.css' );
    }
add_action('wp_enqueue_scripts', 'supernormal_style_sheet');


function supernormal_script_enqueue(){
    // jQuery
    wp_enqueue_script('jquery-js', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', array('jquery'));

    wp_enqueue_script( 'jquery-ui-script', get_stylesheet_directory_uri() . '/js/jquery-ui.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'jquery-ui-script', get_stylesheet_directory_uri() . '/js/jquery-ui.min.js', array(), '1.0.0', true );
    // script cdn
    wp_enqueue_script( 'swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), '1.0.0', true );

    wp_enqueue_script( 'jquery-sticky-script', get_stylesheet_directory_uri() . '/js/jquery.sticky-sidebar.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'home-script', get_stylesheet_directory_uri() . '/js/home.js', array(), '1.0.0', true );
    wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/js/custom.min.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'supernormal_script_enqueue' );

// 커스텀 메뉴
function supernormal_custom_menu() {
    register_nav_menus(
      array(
        'primary-menu'   => __( 'Primary Menu', 'supernormal' ),
        'footer-menu' => __( 'Footer Menu', 'supernormal' ),
        'sidebar-menu' => __( 'Sidebar Menu', 'supernormal' ),
      )
    );
  }
  add_action( 'init', 'supernormal_custom_menu' );


// 커스텀 사이드바 위젯
function supernormal_widgets_sidebar_init() {
	register_sidebar( 
        array(
            'name'          => __( 'Sidebar', 'supernormal' ),
            'id'            => 'sidebar-widget',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) 
    );
}
add_action( 'widgets_init', 'supernormal_widgets_sidebar_init' );

// 커스텀 푸터 위젯
function supernormal_widgets_footer_init() {
	register_sidebar( 
        array(
            'name'          => __( 'Footer', 'supernormal' ),
            'id'            => 'footer-widget',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) 
    );
}
add_action( 'widgets_init', 'supernormal_widgets_footer_init' );


add_filter('get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false);
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_year() ) {
        $title = get_the_date( _x( 'Y', 'yearly archives date format' ) );
    } elseif ( is_month() ) {
        $title = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
    } elseif ( is_day() ) {
        $title = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
    } elseif ( is_tax( 'post_format' ) ) {
        if ( is_tax( 'post_format', 'post-format-aside' ) ) {
            $title = _x( 'Asides', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
            $title = _x( 'Galleries', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
            $title = _x( 'Images', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
            $title = _x( 'Videos', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
            $title = _x( 'Quotes', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
            $title = _x( 'Links', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
            $title = _x( 'Statuses', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
            $title = _x( 'Audio', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
            $title = _x( 'Chats', 'post format archive title' );
        }
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } else {
        $title = __( 'Archives' );
    }
    return $title;
});