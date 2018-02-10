<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Alternative
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo( 'name' ); ?></title>
	<?php
	$company_color      = get_field( 'comp_color' );
	$company_color_back = get_field( 'comp_home_background' );
	?>
	<?php
	if ( is_singular( 'atm-companies' ) && ! empty( $company_color ) ) {
		?>
        <style type="text/css">
            ul.sub-menu {
                background-color: <?php echo $company_color; ?> !important;
            }

            h4 {
                color: <?php echo $company_color; ?> !important;
            }

            .featured {
                border-bottom: 1px solid <?php echo $company_color; ?> !important;
            }

            .article-footer {
                border-top: 1px solid <?php echo $company_color; ?> !important;
            }

            .article-body {
                border-bottom: 1px solid <?php echo $company_color; ?> !important;
            }
            .expertise-column ul li:before {
                color: <?php echo $company_color; ?>;
            }
        </style>
		<?php
	}
	?>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

