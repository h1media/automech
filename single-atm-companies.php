<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php $backgroundimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$company_color       = get_field( 'comp_color' );
		$comp_sub_background = get_field( 'comp_sub_background' );
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
        <div class="mobile-nav menu-holder">
            <div id="nav-icon1">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="responsive-menu" <?php
			if ( ! empty( $company_color ) ) {
				?>
                style="background-color:<?php echo esc_html( $company_color ); ?>;"
				<?php
			}
			?>>
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
            </div>
        </div>
		<?php
		$sub_title = get_field( 'atm_sub_title' );
		if ( ! empty( $sub_title ) ) { ?>
            <span class="header-title" <?php
			if ( ! empty( $company_color ) ) {
				?>
                style="background-color:<?php echo esc_html( $comp_sub_background ); ?>;"
				<?php
			}
			?>>
				<?php echo wp_kses_post( $sub_title ); ?>
			</span>
		<?php } ?>
        </div>
        <div class="container main-content single-company">
			<?php
			$featured_text = get_field( 'atm_featured_text' );
			if ( ! empty( $featured_text ) ) { ?>
                <div class="row featured">
                    <div class="col-12">
						<?php echo wp_kses_post( $featured_text ); ?>
                    </div>
                </div>
			<?php } ?>
            <div class="row article-body">
                <div class="col-12">
					<?php the_content(); ?>
                </div>
            </div>
			<?php
			if ( have_rows( 'comp_areas_expertise' ) ) : ?>
                <div class="row expertise">
                    <div class="col-12">
                        <span class="expertise-heading"><?php esc_html_e( 'Our Areas of Expertise', 'automech' ); ?></span>
                    </div>
					<?php while ( have_rows( 'comp_areas_expertise' ) ) : the_row(); ?>
                        <div class="col-lg-2 col-md-4 col-sm-12 expertise-column">
							<?php
							$exp_image       = get_sub_field( 'expertise_image' );
							$exp_title       = get_sub_field( 'expertise_title' );
							$exp_description = get_sub_field( 'expertise_description' );
							if ( ! empty( $exp_image ) ) { ?>
                                <div class="col-12 expertise-value">
									<img src="<?php echo esc_url( $exp_image['sizes']['expertise-company'] ); ?>" alt="<?php echo esc_html( $exp_image['title'] ); ?>" />
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
			$footer_text = get_field( 'comp_footer' );
			if ( ! empty( $footer_text ) ) { ?>
                <div class="row article-footer comp">
                    <div class="col-12">
						<?php echo wp_kses_post( $footer_text ); ?>
                    </div>
                </div>
			<?php } ?>
        </div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();
