<?php
$facebook = get_field( 'atm_facebook', 'options' );
$twitter  = get_field( 'atm_twitter', 'options' );
$linkedin  = get_field( 'atm_linkedin', 'options' );
if ( ! empty( $facebook ) ) { ?>
	<a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="nofollow"><span
			class="fa fa-facebook" aria-hidden="true"></span></a>
<?php }
if ( ! empty( $twitter ) ) { ?>
	<a href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="nofollow"><span
			class="fa fa-twitter" aria-hidden="true"></span></a>
<?php }
if ( ! empty( $linkedin ) ) { ?>
	<a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="nofollow"><span
			class="fa fa-linkedin" aria-hidden="true"></span></a>
<?php } ?>
