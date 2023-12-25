<?php

/**
 * Theme functions and definitions
 *
 * @package news word
 */
if (!function_exists('newsword_enqueue_styles')) :
	/**
	 * @since 1.0.0
	 */
	function newsword_enqueue_styles()
	{
		wp_enqueue_style('newspaperss-style-parent', get_template_directory_uri() . '/style.css');
		wp_enqueue_style('newsword-style', get_stylesheet_directory_uri() . '/style.css', array('newspaperss-style-parent'), '1.0.0');
	}

endif;
add_action('wp_enqueue_scripts', 'newsword_enqueue_styles', 9999);


/* Remove parent theme page templates */

function newsword_remove_page_templates($page_templates)
{
	unset($page_templates['header.php']);
	unset($page_templates['front-page.php']);
	return $page_templates;
}
add_filter('theme_page_templates', 'newsword_remove_page_templates');

/** call widgets */

require get_theme_file_path('/inc/widgets/latest-posts-carousel.php');
require get_theme_file_path('/inc/widgets/grid-post-blog.php');
