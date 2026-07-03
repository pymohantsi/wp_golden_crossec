<?php
/**
 * Plugin Name: Golden Cross On Site Facilities V2
 * Description: Outputs the approved On Site Facilities V2 styling on the front page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function golden_cross_is_home_onsite_facilities_request() {
	return is_front_page() || is_home() || is_page( 'home' ) || is_page( 9 );
}

function golden_cross_output_onsite_facilities_v2_css() {
	if ( ! golden_cross_is_home_onsite_facilities_request() ) {
		return;
	}
	?>
	<style id="golden-cross-onsite-facilities-v2-css">
	.gc-onsite-facilities-v2-section {
		padding: 80px 40px !important;
		padding-bottom: 0px !important;
		background: #12153a !important;
	}

	.gc-onsite-facilities-v2-header-row,
	.gc-onsite-facilities-v2-grid-row {
		width: 100%;
		max-width: 1499px !important;
		margin: 0 auto !important;
		padding: 0 !important;
	}

	.gc-onsite-facilities-v2-header-col {
		margin-bottom: 48px !important;
	}

	.gc-onsite-facilities-v2-header-col .et_pb_module:last-child,
	.gc-onsite-facilities-v2-grid-row .et_pb_column:last-child .et_pb_module:last-child {
		margin-bottom: 0 !important;
	}

	.gc-onsite-facilities-v2-eyebrow {
		margin: 0 0 12px 0 !important;
		text-align: center;
	}

	.gc-onsite-facilities-v2-eyebrow .et_pb_text_inner {
		color: #d6bd14;
		font-family: 'Inter', sans-serif;
		font-size: 10px;
		font-weight: 600;
		line-height: 15px;
		letter-spacing: 2.2px;
		text-transform: uppercase;
	}

	.gc-onsite-facilities-v2-heading {
		margin: 0 !important;
		text-align: center;
	}

	/* Figma 59:538: Playfair SemiBold 42/63 centered. */
	.gc-onsite-facilities-v2-heading .et_pb_module_header {
		color: #ffffff;
		font-family: 'Playfair Display', serif;
		font-size: 42px;
		font-weight: 600;
		line-height: 63px;
		letter-spacing: 0;
	}

	/*.gc-onsite-facilities-v2-grid-row {
		display: flex;
		flex-wrap: wrap;
	}*/

	.gc-onsite-facilities-v2-grid-row::after {
		display: none !important;
	}

	.gc-onsite-facilities-v2-grid-row > .et_pb_column {
		position: relative;
		/* float: none !important;
		width: calc(50% - 14px) !important;
		margin: 0 28px 28px 0 !important;
		overflow: hidden;
		border-radius: 12px; */
		background: #0b1330;
	}

	.gc-onsite-facilities-v2-grid-row > .et_pb_column:nth-child(2n) {
		margin-right: 0 !important;
	}

	.gc-onsite-facilities-v2-grid-row > .et_pb_column:nth-last-child(-n + 2) {
		margin-bottom: 0 !important;
	}

	.gc-onsite-facilities-v2-image {
		margin: 0 !important;
		line-height: 0;
	}

	/* Figma cards (59:541): square corners, 280px tall,
	   overlay 0.75 -> 0.2 @50% -> 0. */
	.gc-onsite-facilities-v2-image .et_pb_image_wrap {
		position: relative;
		display: block;
		overflow: hidden;
		border-radius: 0;
	}

	.gc-onsite-facilities-v2-image .et_pb_image_wrap::after {
		content: "";
		position: absolute;
		inset: 0;
		background: linear-gradient(to top, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0.2) 50%, rgba(0, 0, 0, 0) 100%);
		pointer-events: none;
	}

	.gc-onsite-facilities-v2-image img {
		display: block;
		width: 100%;
		height: 280px;
		object-fit: cover;
		transition: transform 300ms ease;
	}

	.gc-onsite-facilities-v2-grid-row > .et_pb_column:hover .gc-onsite-facilities-v2-image img,
	.gc-onsite-facilities-v2-grid-row > .et_pb_column:focus-within .gc-onsite-facilities-v2-image img {
		transform: scale(1.04);
	}

	/* Figma H3 (59:544): Playfair SemiBold 20/24, 24px sides / 20px bottom. */
	.gc-onsite-facilities-v2-title {
		position: absolute;
		left: 0;
		right: 0;
		bottom: 0;
		z-index: 3;
		margin: 0 !important;
		padding: 0 24px 20px !important;
		pointer-events: none;
	}

	.gc-onsite-facilities-v2-title .et_pb_text_inner {
		color: #ffffff;
		font-family: 'Playfair Display', serif;
		font-size: 20px;
		font-weight: 600;
		line-height: 24px;
		letter-spacing: 0;
	}

	@media (max-width: 980px) {
		.gc-onsite-facilities-v2-section {
			padding: 72px 32px !important;
		}

		.gc-onsite-facilities-v2-header-col {
			margin-bottom: 40px !important;
		}

		.gc-onsite-facilities-v2-image img {
			height: 280px;
		}
	}

	@media (max-width: 767px) {
		.gc-onsite-facilities-v2-section {
			padding: 56px 24px !important;
		}

		.gc-onsite-facilities-v2-heading .et_pb_module_header {
			font-size: 36px;
			line-height: 1.18;
		}

		.gc-onsite-facilities-v2-grid-row > .et_pb_column {
			width: 100% !important;
			margin: 0 0 0px 0 !important;
		}

		.gc-onsite-facilities-v2-grid-row > .et_pb_column:nth-last-child(-n + 2) {
			margin-bottom: 0px !important;
		}

		.gc-onsite-facilities-v2-grid-row > .et_pb_column:last-child {
			margin-bottom: 0 !important;
		}

		.gc-onsite-facilities-v2-image img {
			height: 240px;
		}

		.gc-onsite-facilities-v2-title {
			padding: 0 20px 18px !important;
		}

		.gc-onsite-facilities-v2-title .et_pb_text_inner {
			font-size: 18px;
			line-height: 22px;
		}
	}
	</style>
	<?php
}
add_action( 'wp_head', 'golden_cross_output_onsite_facilities_v2_css', 129 );
