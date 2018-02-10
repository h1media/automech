<?php
$featured_text = get_field( 'atm_featured_text' );
if ( ! empty( $featured_text ) ) {
	?>
    <div class="row featured">
        <div class="col-12">
			<?php echo wp_kses_post( $featured_text ); ?>
        </div>
    </div>
	<?php
}
?>
<div class="row article">
    <div class="col-12">
		<?php the_content(); ?>
    </div>
</div>
