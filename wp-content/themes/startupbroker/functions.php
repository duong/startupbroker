<?php
/* Theme Options */
require_once dirname( __FILE__ ) . '/option/options.php';
add_theme_support( 'post-thumbnails' );
add_image_size('blog-page', 732, 9999, false);                  // For Blog Page

//Tạo một bộ lọc mới tên là lay_custom_post_type
add_filter('pre_get_posts','lay_custom_post_type');
//Thêm các lệnh thực thi trong bộ lọc

function lay_custom_post_type($query) {
	if((is_category('switzerland') || is_category('germany')) && $query->is_main_query ()){
		$query->set ('post_type', array ('post','teams'));
	}
	return $query;
}
