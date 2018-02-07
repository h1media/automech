<?php
$sub_title = get_field( 'atm_sub_title' );
if ( ! empty( $sub_title ) ) { ?>
	<span class="header-title">
		<?php echo wp_kses_post( $sub_title ); ?>
	</span>
<?php } ?>
