<?php
/**
 * Plugin Name: Golden Cross Stats V2
 * Description: Outputs the approved StatsBar styling on the front page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function golden_cross_is_home_stats_request() {
	return is_front_page() || is_home() || is_page( 'home' ) || is_page( 9 );
}

function golden_cross_enqueue_stats_v2_fonts() {
	if ( ! golden_cross_is_home_stats_request() ) {
		return;
	}

	wp_enqueue_style(
		'golden-cross-stats-v2-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@600&family=Playfair+Display:wght@700&display=swap',
		array(),
		null
	);
}
add_action( 'wp_enqueue_scripts', 'golden_cross_enqueue_stats_v2_fonts' );

function golden_cross_output_stats_v2_css() {
	if ( ! golden_cross_is_home_stats_request() ) {
		return;
	}
	?>
	<style id="golden-cross-stats-v2-css">
	.gc-stats-v2-section {
		background: #12153a !important;
		border-top: 1px solid rgba(214, 189, 20, 0.2) !important;
		border-bottom: 1px solid rgba(214, 189, 20, 0.2) !important;
		padding: 51px 40px !important;
	}

	body #page-container .et-db #et-boc .et-l .gc-stats-v2-section.et_pb_section,
	body.et_pb_pagebuilder_layout.single #page-container #et-boc .et-l .gc-stats-v2-section.et_pb_section,
	body.et_pb_pagebuilder_layout.single.et_full_width_page #page-container #et-boc .et-l .gc-stats-v2-section.et_pb_section {
		width: 100% !important;
		max-width: none !important;
		margin: 0 !important;
	}

	body #page-container .et-db #et-boc .et-l .gc-stats-v2-row.et_pb_row,
	body.et_pb_pagebuilder_layout.single #page-container #et-boc .et-l .gc-stats-v2-row.et_pb_row,
	body.et_pb_pagebuilder_layout.single.et_full_width_page #page-container #et-boc .et-l .gc-stats-v2-row.et_pb_row {
		width: 100% !important;
		max-width: 1499px !important;
		margin: 0 auto !important;
		padding: 0 !important;
	}

	.gc-stats-v2-row > .et_pb_column {
		margin-bottom: 0 !important;
	}

	.gc-stats-v2-eyebrow-module,
	.gc-stats-v2-title-module {
		width: 100%;
		max-width: 269px;
		margin-left: auto !important;
		margin-right: auto !important;
		margin-bottom: 0 !important;
		padding: 0 !important;
	}

	.gc-stats-v2-eyebrow-module .et_pb_text_inner,
	.gc-stats-v2-title-module .et_pb_text_inner {
		width: 100%;
	}

	.gc-stats-v2-eyebrow-module .et_pb_text_inner p {
		margin: 0 !important;
		padding: 0 !important;
		color: #d6bd14 !important;
		font-family: 'Inter', sans-serif !important;
		font-size: 10px !important;
		font-weight: 600 !important;
		line-height: 15px !important;
		letter-spacing: 1.8px !important;
		text-align: center !important;
		text-transform: uppercase !important;
		white-space: nowrap;
	}

	.gc-stats-v2-title-module .et_pb_text_inner h2 {
		margin: 0 !important;
		padding: 0 !important;
		color: #ffffff !important;
		font-family: 'Playfair Display', serif !important;
		font-size: 40px !important;
		font-weight: 700 !important;
		line-height: 60px !important;
		text-align: center !important;
		white-space: nowrap;
	}

	@media (max-width: 980px) {
		.gc-stats-v2-section {
			padding: 51px 32px !important;
		}
	}

	@media (max-width: 767px) {
		.gc-stats-v2-section {
			padding: 47px 24px !important;
		}

		.gc-stats-v2-eyebrow-module,
		.gc-stats-v2-title-module {
			width: 100%;
			max-width: 100%;
		}

		.gc-stats-v2-eyebrow-module .et_pb_text_inner p {
			font-size: 9px !important;
			line-height: 14px !important;
			letter-spacing: 1.4px !important;
			white-space: normal;
		}

		.gc-stats-v2-title-module .et_pb_text_inner h2 {
			font-size: 34px !important;
			line-height: 44px !important;
			white-space: normal;
		}
	}
	</style>
	<?php
}
add_action( 'wp_head', 'golden_cross_output_stats_v2_css', 125 );
