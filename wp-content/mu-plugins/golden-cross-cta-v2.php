<?php
/**
 * Plugin Name: Golden Cross CTA V2
 * Description: Outputs the approved CTA card section styling on the front page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function golden_cross_is_home_cta_request() {
	return is_front_page() || is_home() || is_page( 'home' ) || is_page( 9 );
}

function golden_cross_enqueue_cta_v2_fonts() {
	if ( ! golden_cross_is_home_cta_request() ) {
		return;
	}

	wp_enqueue_style(
		'golden-cross-cta-v2-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@600&family=Playfair+Display:wght@700&display=swap',
		array(),
		null
	);
}
add_action( 'wp_enqueue_scripts', 'golden_cross_enqueue_cta_v2_fonts' );

function golden_cross_output_cta_v2_css() {
	if ( ! golden_cross_is_home_cta_request() ) {
		return;
	}

	$assets = trailingslashit( get_stylesheet_directory_uri() ) . 'assets/';
	?>
	<style id="golden-cross-cta-v2-css">
	.gc-cta-v2-section {
		padding: 0 !important;
		background: #12153a !important;
	}

	.gc-cta-v2-row {
		display: flex;
		width: 100%;
		max-width: 1579px !important;
		margin: 0 auto !important;
		padding: 0 !important;
		flex-wrap: nowrap;
	}

	.gc-cta-v2-row::after {
		display: none !important;
	}

	.gc-cta-v2-row > .et_pb_column {
		float: none !important;
		display: flex;
		flex-direction: column;
		justify-content: flex-end;
		width: 33.3333% !important;
		min-height: 520px;
		margin: 0 !important;
		padding: 36px !important;
		position: relative;
		overflow: hidden;
		background-color: #12153a;
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
		transition: box-shadow 240ms ease, transform 240ms ease;
	}

	/* Figma base overlay (59:402): 0.75 -> 0.15 @60% -> 0. */
	.gc-cta-v2-row > .et_pb_column::before {
		content: "" !important;
		position: absolute;
		inset: 0;
		display: block !important;
		background: linear-gradient(to top, rgba(41, 44, 99, 0.75) 0%, rgba(41, 44, 99, 0.15) 60%, rgba(0, 0, 0, 0) 100%);
		pointer-events: none;
		z-index: 1;
		transition: background 240ms ease;
	}

	/* Figma Link-hover (59:389): 3px gold bottom border. */
	.gc-cta-v2-row > .et_pb_column::after {
		content: "" !important;
		position: absolute;
		left: 0;
		right: 0;
		bottom: 0;
		height: 3px;
		display: block !important;
		background: #d6bd14;
		opacity: 0;
		pointer-events: none;
		z-index: 3;
		transition: opacity 240ms ease;
	}

	.gc-cta-v2-row > .et_pb_column > * {
		position: relative;
		z-index: 4;
	}

	/*.gc-cta-v2-card--events {*/
	/*	background-image: url('<?php echo esc_url( $assets . 'cta-events.png' ); ?>');*/
	/*}*/

	/*.gc-cta-v2-card--clinics {*/
	/*	background-image: url('<?php echo esc_url( $assets . 'cta-clinics.png' ); ?>');*/
	/*}*/

	/*.gc-cta-v2-card--arena {*/
	/*	background-image: url('<?php echo esc_url( $assets . 'cta-arena-hire.png' ); ?>');*/
	/*}*/

	.gc-cta-v2-eyebrow-module,
	.gc-cta-v2-title-module,
	.gc-cta-v2-button {
		width: 100%;
		margin: 0 !important;
	}

	.gc-cta-v2-eyebrow-module .et_pb_text_inner,
	.gc-cta-v2-title-module .et_pb_text_inner {
		width: 100%;
	}

	.gc-cta-v2-eyebrow-module .et_pb_text_inner p {
		margin: 0 !important;
		color: #d6bd14;
		font-family: 'Inter', sans-serif;
		font-size: 10px;
		font-weight: 600;
		line-height: 15px;
		letter-spacing: 2px;
		text-transform: uppercase;
	}

	.gc-cta-v2-title-module {
		margin-top: 8px !important;
	}

	.gc-cta-v2-title-module .et_pb_text_inner h2 {
		margin: 0 !important;
		color: #ffffff;
		font-family: 'Playfair Display', serif;
		font-size: 32px;
		font-weight: 700;
		line-height: 35.2px;
	}

	.gc-cta-v2-button {
		margin-top: 14px !important;
	}

	.et_pb_button.gc-cta-v2-button {
		display: inline-flex;
		align-items: center;
		padding: 0 !important;
		background: transparent !important;
		border: 0 !important;
		box-shadow: none !important;
		color: #d6bd14 !important;
		font-family: 'Inter', sans-serif !important;
		font-size: 12px !important;
		font-weight: 600 !important;
		line-height: 18px !important;
		letter-spacing: 1.44px !important;
		text-decoration: none;
		text-transform: uppercase;
	}

	/* Figma Link-hover keeps the link gold; the hover state lives on the card
	   (gradient + bottom border), not the link text. */
	.et_pb_button.gc-cta-v2-button:hover {
		padding: 0 !important;
		color: #d6bd14 !important;
	}
	.et_pb_button.gc-cta-v2-button::after{
		display: none;
	}

	.gc-cta-v2-row > .et_pb_column:hover::before,
	.gc-cta-v2-row > .et_pb_column:focus-within::before {
		background: linear-gradient(0deg, #292c63 0%, rgba(41, 44, 99, 0.5) 60%, rgba(0, 0, 0, 0) 100%);
	}

	.gc-cta-v2-row > .et_pb_column:hover::after,
	.gc-cta-v2-row > .et_pb_column:focus-within::after {
		opacity: 1;
	}

	@media (max-width: 980px) {
		.gc-cta-v2-row {
			flex-wrap: wrap;
		}

		.gc-cta-v2-row > .et_pb_column {
			width: 100% !important;
			min-height: 420px;
			padding: 24px !important;
		}
	}

	@media (max-width: 767px) {
		.gc-cta-v2-row > .et_pb_column {
			min-height: 320px;
			padding: 24px !important;
		}

		.gc-cta-v2-title-module .et_pb_text_inner h2 {
			font-size: 28px;
			line-height: 31px;
		}
	}
	@media (max-width: 500px) {
		.gc-cta-v2-button {
			margin-top: 0px !important;
		}
	}
	</style>
	<?php
}
add_action( 'wp_head', 'golden_cross_output_cta_v2_css', 126 );
