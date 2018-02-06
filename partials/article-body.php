<?php
$featured_text = get_field( 'atm_featured_text' );
$footer_logo = get_field( 'atm_footer_logo', 'options' );
$footer_text = get_field( 'atm_footer_text', 'options' );
if ( ! empty( $featured_text ) ) { ?>
<div class="row featured">
    <div class="col-12">
        <?php echo esc_html( $featured_text ); ?>
    </div>
</div>
<?php } ?>
<div class="row article">
    <div class="col-12">
        <?php the_content(); ?>
    </div>
</div>