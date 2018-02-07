<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
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
        <section class="main-slider">
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
						echo wp_kses_post( ( ! empty( $cover ) ) ? $cover : '' );
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
        </section>
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
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="row companies-entry">
                                <div class="col-md-6 col-sm-12 entry-left">
                                	<?php
                                	$home_image = get_field( 'comp_home_image' );
                                	$size = 'home-company';
                                	if ( ! empty( $home_image['sizes'][ $size ] ) && ! empty( $home_image['title'] ) ) { ?>
								        <img src="<?php echo esc_url( $home_image['url'] ); ?>" alt="<?php echo esc_html( $home_image['title'] ); ?>"/>
									<?php } ?>
                                </div>
                                <div class="col-md-6 col-sm-12 entry-right">
                                	<?php
                                	$atm_logo = get_field( 'atm_custom_logo' );
                                	if ( ! empty( $atm_logo['url'] ) && ! empty( $atm_logo['title'] ) ) { ?>
								        <img src="<?php echo esc_url( $atm_logo['url'] ); ?>" alt="<?php echo esc_html( $atm_logo['title'] ); ?>"/>
									<?php } ?>
									<?php
									$home_comp = get_field( 'comp_home_text' );
									if ( ! empty ( $home_comp ) ) { 
										echo wp_kses_post( $home_comp );
									}
									?>
                                    <a href="<?php the_permalink(); ?>"
                                       class="read-more"><?php _e( 'Read More', 'automech' ); ?></a>
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
