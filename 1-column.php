<?php
/**
 * Template Name: 1 column
 *
 */
?>

<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php $backgroundimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		if ( ! empty( $backgroundimg[0] ) ) { ?>
			<div class="container-fluid header" style="background: url('<?php echo esc_url( $backgroundimg[0] ); ?>');">
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
		<div class="container main-content 1-column">
			<?php
			$featured_text = get_field( 'atm_featured_text' );
			if ( ! empty( $featured_text ) ) {
				?>
				<div class="row featured">
					<div class="col-12">
						<?php echo wp_kses_post( $featured_text ); ?>
					</div>
				</div>
				<?php
			}
			?>
			<div class="row article contact">
				<div class="col-12">
					<?php the_content(); ?>
				</div>
			</div>
			<?php get_template_part( 'partials/article-footer' ); ?>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();
