<?php
/**
* Plugin name: Automech Site wide plugin
*
*
*/
function create_posttype() {
	register_post_type( 'atm-companies',
		array(
			'labels' => array(
				'name' => __( 'Companies' ),
				'singular_name' => __( 'Company' ),
				'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions' ),
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'our-companies'),
		)
	);
}
add_action( 'init', 'create_posttype' );
?>