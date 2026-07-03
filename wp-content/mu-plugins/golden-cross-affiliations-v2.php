<?php
/**
 * Plugin Name: Golden Cross Affiliations V2
 * Description: Outputs the approved Affiliations V2 styling on the front page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function golden_cross_is_home_affiliations_request() {
	return is_front_page() || is_home() || is_page( 'home' ) || is_page( 9 );
}

function golden_cross_output_affiliations_v2_css() {
	if ( ! golden_cross_is_home_affiliations_request() ) {
		return;
	}
	?>
	<style id="golden-cross-affiliations-v2-css">
	.gc-affiliations-v2-section {
		padding: 80px 40px !important;
		background: #f4f4f0 !important;
	}

	.gc-affiliations-v2-row {
		width: 100%;
		max-width: 1499px !important;
		margin: 0 auto !important;
		padding: 0 !important;
	}

	.gc-affiliations-v2-row > .et_pb_column {
		margin-bottom: 0;
	}

	/* .gc-affiliations-v2-header-col {
		margin-bottom: 48px !important;
	} */

	.gc-affiliations-v2-header-col .et_pb_module:last-child,
	.gc-affiliations-v2-grid-row .et_pb_column:last-child .et_pb_module:last-child {
		margin-bottom: 0 !important;
	}

	.gc-affiliations-v2-eyebrow {
		margin: 0 0 14px 0 !important;
		text-align: center;
	}

	.gc-affiliations-v2-eyebrow .et_pb_text_inner {
		color: #d6bd14;
		font-family: 'Inter', sans-serif;
		font-size: 10px;
		font-weight: 600;
		line-height: 15px;
		letter-spacing: 2.2px;
		text-transform: uppercase;
	}

	.gc-affiliations-v2-heading {
		margin: 0 auto !important;
		text-align: center;
		max-width: 768px;
	}

	/* Figma 59:567: Playfair SemiBold 40/48 centered. */
	.gc-affiliations-v2-heading .et_pb_module_header {
		color: #12153a;
		font-family: 'Playfair Display', serif;
		font-size: 40px;
		font-weight: 600;
		line-height: 48px;
		letter-spacing: 0;
	}

	/* Figma 59:569: 480px wide, 16px above, 15/24.75. */
	.gc-affiliations-v2-body {
		max-width: 480px;
		margin: 16px auto 0 !important;
		text-align: center;
	}

	.gc-affiliations-v2-body .et_pb_text_inner {
		color: #6b6b6b;
		font-family: 'Inter', sans-serif;
		font-size: 15px;
		font-weight: 400;
		line-height: 24.75px;
		letter-spacing: 0;
	}

	/* Figma 59:571: cards live in an 880px block centered in the section. */
	.gc-affiliations-v2-grid-row {
		display: flex;
		flex-wrap: wrap;
		width: 100%;
		max-width: 880px !important;
		margin: 0 auto !important;
		padding: 0 !important;
	}

	.gc-affiliations-v2-grid-row::after {
		display: none !important;
	}

	/* Figma cards (59:572): 277px wide, 36px/28px padding, 24.5px gaps. */
	.gc-affiliations-v2-grid-row > .et_pb_column {
		float: none !important;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		width: calc(33.3333% - 16.5px) !important;
		margin: 0 24.5px 0 0 !important;
		padding: 36px 28px !important;
		border-radius: 12px;
		background: #ffffff;
		box-shadow: 0 4px 10px rgba(18, 21, 58, 0.08);
		transition: transform 300ms ease, box-shadow 300ms ease;
	}

	.gc-affiliations-v2-grid-row > .et_pb_column:last-child {
		margin-right: 0 !important;
	}

	.gc-affiliations-v2-grid-row > .et_pb_column:hover,
	.gc-affiliations-v2-grid-row > .et_pb_column:focus-within {
		transform: translateY(-4px);
		box-shadow: 0 12px 24px rgba(18, 21, 58, 0.12);
	}

	/* Figma logo (59:573): 140x80 contain, 16px gap to label. */
	.gc-affiliations-v2-logo {
		width: 100%;
		margin: 0 auto 16px !important;
		text-align: center;
		line-height: 0;
	}

	.gc-affiliations-v2-logo .et_pb_image_wrap,
	.gc-affiliations-v2-logo img {
		display: block;
		margin: 0 auto;
	}

	.gc-affiliations-v2-logo img {
		width: 140px;
		height: 80px;
		object-fit: contain;
	}

	.gc-affiliations-v2-card-title {
		width: 100%;
		margin: 0 !important;
		text-align: center;
	}

	/* Figma label (59:575): Inter SemiBold 13/19.5, 0.26px tracking. */
	.gc-affiliations-v2-card-title .et_pb_text_inner {
		color: #12153a;
		font-family: 'Inter', sans-serif;
		font-size: 13px;
		font-weight: 600;
		line-height: 19.5px;
		letter-spacing: 0.26px;
	}

	.gc-affiliations-v2-banner-section {
		padding: 35px !important;
		background: #12153A !important;
	}

	.gc-affiliations-v2-banner-row {
		width: 100%;
		max-width: 1499px !important;
		margin: 0 auto !important;
		padding: 0 !important;
	}

	.gc-affiliations-v2-banner-col {
		display: flex !important;
		flex-direction: row;
		flex-wrap: wrap;
		align-items: center;
		justify-content: center;
		gap: 16px;
	}

	.gc-affiliations-v2-banner-col .et_pb_module {
		margin: 0 !important;
	}

	.gc-affiliations-v2-banner-label,
	.gc-affiliations-v2-banner-label .et_pb_text_inner {
		color: #D6BD14;
		font-family: 'Bebas Neue', sans-serif;
		font-weight: 400;
		font-size: 28px;
		line-height: 42px;
		letter-spacing: 1.68px;
	}

	.gc-affiliations-v2-banner-caption,
	.gc-affiliations-v2-banner-caption .et_pb_text_inner {
		color: rgba(255, 255, 255, 0.75);
		font-family: 'Inter', sans-serif;
		font-weight: 500;
		font-size: 14px;
		line-height: 21px;
		letter-spacing: 0.56px;
	}

	@media (max-width: 980px) {
		.gc-affiliations-v2-section {
			padding: 72px 32px !important;
		}

		.gc-affiliations-v2-grid-row > .et_pb_column {
			width: calc(50% - 14px) !important;
			min-height: 220px;
			margin: 0 28px 28px 0 !important;
		}

		.gc-affiliations-v2-grid-row > .et_pb_column:nth-child(2n) {
			margin-right: 0 !important;
		}

		.gc-affiliations-v2-grid-row > .et_pb_column:last-child {
			margin-bottom: 0 !important;
		}
	}

	@media (max-width: 767px) {
		.gc-affiliations-v2-section {
			padding: 56px 24px !important;
		}

		/* .gc-affiliations-v2-header-col {
			margin-bottom: 36px !important;
		} */

		.gc-affiliations-v2-heading .et_pb_module_header {
			font-size: 36px;
			line-height: 1.18;
		}

		.gc-affiliations-v2-grid-row > .et_pb_column {
			width: 100% !important;
			margin: 0 0 24px 0 !important;
		}
	}
	</style>
	<?php
}
add_action( 'wp_head', 'golden_cross_output_affiliations_v2_css', 129 );
