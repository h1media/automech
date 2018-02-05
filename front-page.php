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
		  <div class="item vimeo" data-video-start="4">
		    <iframe class="embed-player slide-media" src="https://player.vimeo.com/video/217885864?api=1&byline=0&portrait=0&title=0&background=1&mute=1&loop=1&autoplay=0&id=217885864" width="980" height="520" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		  </div>
		  <div class="item youtube">
		    <iframe class="embed-player slide-media" width="980" height="520" src="https://www.youtube.com/embed/tdwbYGe8pv8?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=1&playlist=tdwbYGe8pv8&start=102" frameborder="0" allowfullscreen></iframe> 
		  </div>
		  <div class="item video">
		    <video class="slide-video slide-media" loop muted preload="metadata" poster="https://drive.google.com/uc?export=view&id=0B_koKn2rKOkLSXZCakVGZWhOV00">
		      <source src="https://player.vimeo.com/external/138504815.sd.mp4?s=8a71ff38f08ec81efe50d35915afd426765a7526&profile_id=112" type="video/mp4" />
		    </video>
		  </div>
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
