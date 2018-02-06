<div class="row article-footer">
	<?php
	if ( ! empty( $footer_logo['url'] ) ) { ?>
    <div class="col-12">
       <img src="<?php echo esc_url( $footer_logo['url'] ); ?>"
                             alt="<?php echo esc_html( ( ! empty( $footer_logo['title'] ) ) ? $footer_logo['title'] : the_title() ); ?>"/>
    </div>
    <?php }
    if ( ! empty( $footer_text ) ) { ?>
    <div class="col-12">
        <?php echo wp_kses_post( $footer_text ); ?>
    </div>
    <?php } ?>
</div>