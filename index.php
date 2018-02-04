<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<?php $backgroundimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

        <div class="container-fluid header" style="background: url('<?php echo $backgroundimg[0]; ?>') no-repeat;">

            <div class="container">
                <div class="row">

					<?php get_template_part( 'partials/header-logo' ); ?>

					<?php get_template_part( 'partials/header-social' ); ?>

                </div>
            </div>

			<?php get_template_part( 'partials/header-menu' ); ?>

			<?php if ( get_field( 'atm_sub_title' ) ) : ?>
                <h1 class="header-title">
					<?php the_field( 'atm_sub_title' ); ?>
                </h1>
			<?php endif; ?>

        </div>

        <div class="container main-content">
        <div class="row">
        <div class="col-12">
		<?php the_content(); ?>
	<?php endwhile; ?>
<?php endif; ?>
    </div>
    </div>
    </div>

<?php get_footer();
