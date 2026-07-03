<?php
/**
 * Plugin Name: Golden Cross Home Sections V2
 * Description: Full-width layout overrides for approved homepage sections.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function golden_cross_is_home_sections_request() {
	return is_front_page() || is_home() || is_page( 'home' ) || is_page( 9 );
}

function golden_cross_output_home_sections_v2_css() {
	if ( ! golden_cross_is_home_sections_request() ) {
		return;
	}
	?>
	<style id="golden-cross-home-sections-v2-css">
	.gc-cta-v2-section,
	.gc-welcome-split-section {
		padding-right: 0 !important;
		padding-left: 0 !important;
	}

	.gc-cta-v2-row,
	.gc-welcome-split-row {
		max-width: none !important;
		width: 100% !important;
	}

	.gc-welcome-split-section {
		padding-top: 0 !important;
		padding-bottom: 0 !important;
	}

	/* Divi's critical CSS adds 25px bottom padding to the last row of sticky
	   sections at (0,3,0) specificity; match it so 0-padding wins here. */
	.et_pb_section_sticky .et_pb_row.gc-welcome-split-row,
	.et_pb_section_sticky .et_pb_row.gc-cta-v2-row,
	.gc-welcome-split-row.et_pb_row,
	.gc-cta-v2-row.et_pb_row {
		padding: 0 !important;
	}

	.gc-welcome-split-image-col,
	.gc-welcome-split-content-col {
		min-height: 688px;
	}

	.gc-welcome-split-content-col {
		padding: 72px 56px !important;
	}

	.gc-welcome-split-eyebrow,
	.gc-welcome-split-heading,
	.gc-welcome-split-divider,
	.gc-welcome-split-body,
	.gc-welcome-split-feature,
	.gc-welcome-split-button {
		max-width: 678px;
	}

	@media (max-width: 980px) {
		.gc-welcome-split-content-col {
			padding: 64px 42px !important;
		}
		.gc-welcome-split-image-col,
		.gc-welcome-split-content-col {
			min-height: 0px;
		}
	}

	@media (max-width: 767px) {
		.gc-welcome-split-content-col {
			padding: 44px 28px !important;
		}
	}
	</style>
	<?php
}
add_action( 'wp_head', 'golden_cross_output_home_sections_v2_css', 129 );
