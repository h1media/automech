<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php $backgroundimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		if ( ! empty( $backgroundimg[0] ) ) { ?>
            <div class="container-fluid header" style="background: url('<?php echo esc_url( $backgroundimg[0] );  ?>');">
		<?php } else { ?>
            <div class="container-fluid header no-bcg">
		<?php } ?>
        <div class="container">
            <div class="row">
				<?php get_template_part( 'partials/header-logo' ); ?>
				<?php get_template_part( 'partials/header-social' ); ?>
            </div>
        </div>
		<?php get_template_part( 'partials/header-menu' ); ?>
		<?php get_template_part( 'partials/header-subtitle' ); ?>
        </div>
        <div class="container main-content">
	        <?php get_template_part( 'partials/article-body' ); ?>
	        <?php get_template_part( 'partials/article-footer' ); ?>
        </div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();
