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
		<?php
		$sub_title = get_field( 'atm_sub_title' );
		if ( ! empty( $sub_title ) ) { ?>
            <h1 class="header-title">
				<?php echo esc_html( $sub_title ); ?>
            </h1>
		<?php } ?>
        </div>
        <div class="container main-content single-company">
			<?php
			$featured_text = get_field( 'atm_featured_text' );
			$footer_text   = get_field( 'comp_footer' );
			if ( ! empty( $featured_text ) ) { ?>
                <div class="row featured">
                    <div class="col-12">
						<?php echo esc_html( $featured_text ); ?>
                    </div>
                </div>
			<?php } ?>
            <div class="row article">
                <div class="col-12">
					<?php the_content(); ?>
                </div>
            </div>
			<?php
			if ( have_rows( 'comp_areas_expertise' ) ) : ?>
                <div class="row expertise">
					<?php while ( have_rows( 'comp_areas_expertise' ) ) : the_row(); ?>
                        <div class="col-lg-2 col-md-4 col-sm-12 expertise-column">
							<?php
							$exp_image       = get_sub_field( 'expertise_image' );
							$exp_title       = get_sub_field( 'expertise_title' );
							$exp_description = get_sub_field( 'expertise_description' );
							if ( ! empty( $exp_image['url'] ) ) { ?>
                                <div class="col-12 expertise-value">
                                    <img src="<?php echo esc_url( $exp_image['url'] ); ?>"
                                         alt="<?php echo esc_html( ( ! empty( $exp_image['title'] ) ) ? $exp_image['title'] : the_title() ); ?>"/>
                                </div>
							<?php }
							if ( ! empty( $exp_title ) ) { ?>
                                <div class="col-12 expertise-value">
                                    <h3><?php echo esc_html( $exp_title ); ?></h3>
                                </div>
							<?php }
							if ( ! empty( $exp_description ) ) { ?>
                                <div class="col-12 expertise-value">
									<?php echo wp_kses_post( $exp_description ); ?>
                                </div>
							<?php } ?>
                        </div>
					<?php endwhile; ?>
                </div>
			<?php endif; ?>
			<?php
			if ( ! empty( $footer_text ) ) { ?>
                <div class="row article-footer">
                    <div class="col-12">
						<?php echo wp_kses_post( $footer_text ); ?>
                    </div>
                </div>
			<?php } ?>
        </div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();
