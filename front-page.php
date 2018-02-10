<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
        <div class="main-slider">
			<?php if ( have_rows( 'video_slider' ) ) : ?>
				<?php while ( have_rows( 'video_slider' ) ) : the_row(); ?>
					<?php
					$video_link_webm = get_sub_field( 'video_link_webm' );
					$video_link_ogv  = get_sub_field( 'video_ogv' );
					$video_link_mp4  = get_sub_field( 'video_mp4' );
					$cover           = get_sub_field( 'cover_photo' );
					?>
                    <div class="item video">
                        <video poster="<?php
						echo esc_html( ( ! empty( $cover ) ) ? $cover : '' );
						?>" class="slide-video slide-media" loop muted
                               preload="metadata">
							<?php
							if ( ! empty( $video_link_webm ) ) { ?>
                                <source src="<?php echo esc_url( $video_link_webm ); ?>" type="video/webm"/>
							<?php }
							if ( ! empty( $video_link_ogv ) ) { ?>
                                <source src="<?php echo esc_url( $video_link_ogv ); ?>" type="video/ogg"/>
							<?php }
							if ( ! empty( $video_link_mp4 ) ) { ?>
                                <source src="<?php echo esc_url( $video_link_mp4 ); ?>"/>
							<?php } ?>
                        </video>
                    </div>
				<?php endwhile; ?>
			<?php endif; ?>
        </div>
        <div class="container-fluid header home">
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
            <div class="row article-home">
                <div class="col-12">
					<?php the_content(); ?>
                </div>
            </div>
            <div class="row companies-list">
                <div class="col-12">
					<?php
					$args      = array(
						'post_type'   => 'atm-companies',
						'post_status' => 'publish',
					);
					$the_query = new WP_Query( $args ); ?>
					<?php if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post();
							$company_color      = get_field( 'comp_color' );
							$company_color_back = get_field( 'comp_home_background' );
							?>
                            <div class="row companies-entry"
								<?php
								if ( ! empty( $company_color_back ) ) {
									?>
                                    style="background-color:<?php echo esc_html( $company_color_back ); ?>;"
									<?php
								}
								?>>
								<?php
								$attachment_id = get_field( 'comp_home_image' );
								$home_image    = wp_get_attachment_image_src( $attachment_id, 'home-company' );
								?>
                                <div class="col-md-6 col-sm-12 entry-left" <?php
								if ( ! empty( $home_image[0] ) ) {
									?>
                                    style="background-image:url(<?php echo esc_url( $home_image[0] ); ?>);"
									<?php
								}
								?>>
                                </div>
                                <div class="col-md-6 col-sm-12 entry-right">
                                    <div class="col-12 entry-logo">
                                        <a href="<?php the_permalink(); ?>">
											<?php $atm_logo = get_field( 'atm_custom_logo' );
											if ( ! empty( $atm_logo['url'] ) && ! empty( $atm_logo['title'] ) ) { ?>
                                                <img src="<?php echo esc_url( $atm_logo['url'] ); ?>"
                                                     alt="<?php ( ! empty( $atm_logo['title'] ) ) ? $atm_logo['title'] : the_title(); ?>"/>
											<?php } elseif ( function_exists( 'the_custom_logo' ) ) { ?>
												<?php the_custom_logo(); ?>
											<?php } ?>
                                        </a>
                                    </div>
									<?php
									$home_comp = get_field( 'comp_home_text' );
									if ( ! empty( $home_comp ) ) {
										?>
                                        <div class="col-12 entry-text">
											<?php echo wp_kses_post( $home_comp ); ?>
                                        </div>
										<?php
									}
									?>
                                    <a href="<?php the_permalink(); ?>"
                                       class="read-more entry-link"><?php _e( 'Read More', 'automech' ); ?> <span
                                                class="fa fa-chevron-circle-right " aria-hidden="true"
                                                style="color:<?php echo esc_html( $company_color ); ?>;"></span></a>
                                </div>
                            </div>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php else : ?>
                        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'automech' ); ?></p>
					<?php endif; ?>
                </div>
            </div>
			<?php get_template_part( 'partials/article-footer' ); ?>
        </div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();
