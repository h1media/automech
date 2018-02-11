<?php
/**
 * Footer
 *
 * @package Alternative
 */

?>
    </div>
    <footer>
        <div class="container-fluid footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 left">
						<?php get_template_part( 'partials/social' ); ?>
						<?php
						$copyright = get_field( 'atm_copyright', 'options' );
						if ( ! empty( $copyright ) ) {
							?>
                            <span class="copyright"><?php echo esc_html( $copyright ); ?></span>
							<?php
						}
						?>
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
