<div class="col-md-6 col-sm-12 logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php $atm_logo = get_field( 'atm_custom_logo' );
		if ( ! empty( $atm_logo['url'] ) && ! empty( $atm_logo['title'] ) ) { ?>
            <img src="<?php echo esc_url( $atm_logo['url'] ); ?>" alt="<?php echo esc_html( $atm_logo['title'] ); ?>"/>
		<?php } elseif ( function_exists( 'the_custom_logo' ) ) { ?>
			<?php the_custom_logo(); ?>
		<?php } ?>
    </a>
</div>
