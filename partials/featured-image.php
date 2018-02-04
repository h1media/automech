<?php
/**
 * Featured image for page
 *
 * @package Alternative
 */

$featured_image = wp_get_attachment_url( get_post_thumbnail_id() );
if ( $featured_image ) {
	?>
    <div class="container-fluid">
        <div class="bg-image" style="background-image: url(<?php echo esc_url( $featured_image ); ?>);"></div>
    </div>
	<?php
} else {
	?>
    <div style="margin-top: 90px"></div>
	<?php
}
