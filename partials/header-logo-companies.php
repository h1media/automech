<div class="col-lg-6 col-md-12 logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
	<?php $comp_logo = get_field( 'comp_logo' );
	if ( ! empty( $comp_logo['url'] ) && ! empty( $comp_logo['title'] ) ) { ?>
        <img src="<?php echo esc_url( $comp_logo['url'] ); ?>" alt="<?php echo esc_html( $comp_logo['title'] ); ?>"/>
	<?php } elseif ( function_exists( 'the_custom_logo' ) ) { ?>
		<?php the_custom_logo(); ?>
	<?php } ?>
    </a>
</div>
