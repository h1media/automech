<?php
/**
 * Footer
 *
 * @package Alternative
 */

?>
    </div>

    <footer>
		<?php
		$facebook = get_field( 'atm_facebook', 'options' );
		$twitter  = get_field( 'atm_twitter', 'options' );
		?>
        <div class="container-fluid footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 left">
						<?php
						if ( ! empty( $facebook ) ) : ?>
                            <a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="nofollow"><span
                                        class="fa fa-facebook" aria-hidden="true"></span></a>
						<?php endif; ?>
						<?php
						if ( ! empty( $twitter ) ) : ?>
                            <a href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="nofollow"><span
                                        class="fa fa-twitter" aria-hidden="true"></span></a>
						<?php endif; ?>

                    </div>
                    <div class="col-md-6 col-sm-12 right">
                        <nav class="menu-holder">
							<?php wp_nav_menu( array( 'theme_location' => 'extra-menu' ) ); ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="http://automech.loc.com:35743/livereload.js"></script>

<?php
wp_footer();
