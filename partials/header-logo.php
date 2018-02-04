<div class="col-lg-6 col-md-12 logo">

	<?php if ( get_field( 'atm_custom_logo' ) ) : ?>
        <img src="<?php the_field( 'atm_custom_logo' ); ?>"/>
	<?php elseif ( function_exists( 'the_custom_logo' ) ) : ?>
		<?php the_custom_logo(); ?>
	<?php endif; ?>

</div>
