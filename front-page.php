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
		if( have_rows('slide') ):
		    while ( have_rows('slide') ) : the_row(); ?>
				<?php
				$video_link1 = get_sub_field( 'video_link_webm' );
				$video_link2 = get_sub_field( 'video_ogv' );
				$video_link3 = get_sub_field( 'video_mp4' );
				$cover = get_sub_field( 'cover_photo' );
				?>
					<div class="item video">
						<video  poster="<?php echo esc_url( $cover ); ?>" class="slide-video slide-media" loop muted preload="metadata">
							<source src="<?php echo esc_url( $video_link1 ); ?>" type="video/webm" />
							<source src="<?php echo esc_url( $video_link2 ); ?>" type="video/ogg" />
							<source src="<?php echo esc_url( $video_link3 ); ?>" />
						</video>
					</div>
		    <?php endwhile;
		else :
		endif;
		?>
		</section>
			
		</div>

        <div class="container main-content">
            <div class="row">
                <div class="col-12">
                	<?php the_content(); ?>
                </div>
            </div>
        </div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();
