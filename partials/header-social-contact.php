<div class="col-md-6 col-sm-12 social-top">
	<?php
	$facebook = get_field( 'atm_facebook', 'options' );
	$twitter  = get_field( 'atm_twitter', 'options' );
	$linkedin  = get_field( 'atm_linkedin', 'options' );
	$contact_text  = get_field( 'atm_contact_text', 'options' );
	$contact_url  = get_field( 'atm_contact_url', 'options' );
	if ( ! empty( $contact_text ) && ! empty( $contact_url ) ) { ?>
		<a class="contact-us-button" href="<?php echo esc_url( $contact_url ); ?>" rel="nofollow"><?php echo esc_html( $contact_text ); ?></a>
	<?php }
	if ( ! empty( $facebook ) ) { ?>
		<a class="social" href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="nofollow"><span
				class="fa fa-facebook" aria-hidden="true"></span></a>
	<?php }
	if ( ! empty( $twitter ) ) { ?>
		<a class="social" href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="nofollow"><span
				class="fa fa-twitter" aria-hidden="true"></span></a>
	<?php }
	if ( ! empty( $linkedin ) ) { ?>
		<a class="social" href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="nofollow"><span
				class="fa fa-linkedin" aria-hidden="true"></span></a>
	<?php } ?>
</div>
