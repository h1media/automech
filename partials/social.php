<?php
$facebook = get_field( 'atm_facebook', 'options' );
$twitter  = get_field( 'atm_twitter', 'options' );
if ( ! empty( $facebook ) ) { ?>
	<a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="nofollow"><span
			class="fa fa-facebook" aria-hidden="true"></span></a>
<?php } ?>
<?php
if ( ! empty( $twitter ) ) { ?>
	<a href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="nofollow"><span
			class="fa fa-twitter" aria-hidden="true"></span></a>
<?php } ?>
