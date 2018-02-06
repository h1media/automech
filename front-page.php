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
			<?php
			$sub_title = get_field( 'atm_sub_title' );
			if ( ! empty( $sub_title ) ) { ?>
				<h1 class="header-title">
					<?php echo esc_html( $sub_title ); ?>
				</h1>
			<?php } ?>
		</div>
		<section class="main-slider">
			<?php
			$video1 = get_field( 'atm_video_1' );
			$video2 = get_field( 'atm_video_2' );
			$video3 = get_field( 'atm_video_3' );
			if ( ! empty( $video1 ) ) { ?>
				<div class="item vimeo" data-video-start="4">
					<iframe class="embed-player slide-media" src="<?php echo esc_url( $video1 ); ?>" width="980" height="520" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				</div>
			<?php }
			if ( ! empty( $video2 ) ) { ?>
				<div class="item youtube">
					<iframe class="embed-player slide-media" width="980" height="520" src="<?php echo esc_url( $video2 ); ?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<?php }
			if ( ! empty( $video3 ) ) { ?>
				<div class="item video">
					<video class="slide-video slide-media" loop muted preload="metadata" poster="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLSXZCakVGZWhOV00">
						<source src="<?php echo esc_url( $video3 ); ?>" type="video/mp4" />
					</video>
				</div>
			<?php } ?>
		</section>
		</div>
		<div class="container main-content">
			<?php get_template_part( 'partials/article-body' ); ?>
			<div class="row companies-list">
				<div class="col-12">
					<?php
					$args = array(
						'post_type' => 'atm-companies',
						'post_status' => 'publish',
					);
					$the_query = new WP_Query( $args ); ?>
					<?php if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="row company">
								<div class="col-md-6 col-sm-12 company-left">
									
								</div>
								<div class="col-md-6 col-sm-12 company-right">
									<?php
									$comp_logo = get_field( 'comp_logo' );
					            	if ( ! empty( $comp_logo['url'] ) ) { ?>
					                <div class="col-12 company-logo">
						               <img src="<?php echo esc_url( $comp_logo['url'] ); ?>"
					                                         alt="<?php echo esc_html( ( ! empty( $comp_logo['title'] ) ) ? $comp_logo['title'] : the_title() ); ?>"/>
					                </div>
					                <?php } ?>
					                <div class="col-12 company-text">
										<?php the_excerpt(); ?>
									</div>
									<div class="col-12 company-link">
										<a href="<?php the_permalink(); ?>" class="read-more"><?php _e( 'Read More', 'automech' ); ?></a>
									</div>
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
