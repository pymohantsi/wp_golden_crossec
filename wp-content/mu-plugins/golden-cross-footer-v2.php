<?php
/**
 * Plugin Name: Golden Cross Footer V2
 * Description: Outputs the approved global footer styling for the Golden Cross site.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function golden_cross_output_footer_v2_css() {
	?>
	<style id="golden-cross-footer-v2-css">
	.et-l--footer .gc-footer-v2-section {
		background: #12153a !important;
		padding: 50px 50px 0 !important;
		border-top: 2px solid #d6bd14;
	}

	.et-l--footer .gc-footer-v2-main-row,
	.et-l--footer .gc-footer-v2-bottom-row,
	.et-l--footer .gc-footer-v2-brand-row {
		width: 100%;
		max-width: 1499px !important;
		margin: 0 auto !important;
		padding: 0 !important;
	}

	@media (min-width: 981px) {
		.et-l--footer .gc-footer-v2-main-row {
			padding: 0 50px !important;
			justify-content: center;
			column-gap: 60px;
		}
	}

	.et-l--footer .gc-footer-v2-main-row,
	.et-l--footer .gc-footer-v2-bottom-row,
	.et-l--footer .gc-footer-v2-brand-row,
	.et-l--footer .gc-footer-v2-social-wrap {
		display: flex;
		flex-wrap: wrap;
	}

	.et-l--footer .gc-footer-v2-main-row::after,
	.et-l--footer .gc-footer-v2-bottom-row::after,
	.et-l--footer .gc-footer-v2-brand-row::after,
	.et-l--footer .gc-footer-v2-social-wrap::after {
		display: none !important;
	}

	.et-l--footer .gc-footer-v2-main-row > .et_pb_column {
		float: none !important;
		margin: 0 0 48px 0 !important;
	}

	.et-l--footer .gc-footer-v2-col-primary {
		width: 45% !important;
		padding-right: 56px !important;
	}

	.et-l--footer .gc-footer-v2-col-links,
	.et-l--footer .gc-footer-v2-col-events,
	.et-l--footer .gc-footer-v2-col-venue {
		width: 18.333% !important;
	}

	/* Figma (node 59:587) sizes the four footer columns to a compact
	   ~1060px block (215px columns, 60px gaps) centered inside the
	   section, not stretched across the full 1499px row. Column 1
	   (node 59:590) is content-sized to 221.37px, driven by the
	   logo (100px) + 12px gap + brand name text (109.37px) row. */
	@media (min-width: 981px) {
		.et-l--footer .gc-footer-v2-col-primary {
			width: 221.37px !important;
			padding-right: 0 !important;
		}

		.et-l--footer .gc-footer-v2-col-links,
		.et-l--footer .gc-footer-v2-col-events,
		.et-l--footer .gc-footer-v2-col-venue {
			width: 215px !important;
		}
	}
	@media (max-width: 1200px) {
.et-l--footer .gc-footer-v2-col-links,
		.et-l--footer .gc-footer-v2-col-events,
		.et-l--footer .gc-footer-v2-col-venue {
			width: 100px !important;
		}
	}

	.et-l--footer .gc-footer-v2-brand-row {
		align-items: center;
		margin-bottom: 20px !important;
	}

	.et-l--footer .gc-footer-v2-brand-row > .et_pb_column {
		float: none !important;
		margin: 0 !important;
	}

	.et-l--footer .gc-footer-v2-brand-logo-col {
		width: 100px !important;
		flex: 0 0 100px !important;
	}

	.et-l--footer .gc-footer-v2-brand-name-col {
		width: calc(100% - 100px) !important;
		flex: 1 1 auto !important;
		padding-left: 12px !important;
	}

	.et-l--footer .gc-footer-v2-brand-logo,
	.et-l--footer .gc-footer-v2-brand-logo .et_pb_image_wrap,
	.et-l--footer .gc-footer-v2-brand-logo img {
		display: block;
		width: 100px;
		height: 100px;
	}

	.et-l--footer .gc-footer-v2-brand-logo img {
		object-fit: cover;
		border-radius: 6px;
	}

	.et-l--footer .gc-footer-v2-brand-name,
	.et-l--footer .gc-footer-v2-brand-name p {
		margin: 0 !important;
		padding: 0 !important;
		color: #ffffff;
		font-family: 'Playfair Display', serif;
		font-size: 13px;
		font-weight: 700;
		line-height: 17.55px;
	}

	.et-l--footer .gc-footer-v2-heading,
	.et-l--footer .gc-footer-v2-heading p {
		margin: 0 !important;
		padding: 0 !important;
		color: #d6bd14;
		font-family: 'Inter', sans-serif;
		font-size: 10px;
		font-weight: 600;
		line-height: 15px;
		letter-spacing: 2.2px;
		text-transform: uppercase;
	}

	.et-l--footer .gc-footer-v2-heading {
		margin-bottom: 12px !important;
	}

	.et-l--footer .gc-footer-v2-divider {
		margin: 0 0 22px 0 !important;
	}

	.et-l--footer .gc-footer-v2-divider .et_pb_divider_internal {
		display: none !important;
	}

	.et-l--footer .gc-footer-v2-contact {
		position: relative;
		margin: 0 !important;
		padding-left: 20px !important;
	}

	.et-l--footer .gc-footer-v2-contact:last-of-type {
		margin-bottom: 0 !important;
	}

	/* Figma vertical rhythm (nodes 59:595-59:620): 12px after address,
	   8px after phone, 8px after email, 16px before the social row. */
	.et-l--footer .gc-footer-v2-contact--address {
		margin-bottom: 12px !important;
		padding-left: 21px !important;
	}

	.et-l--footer .gc-footer-v2-contact--phone {
		margin-bottom: 8px !important;
	}

	.et-l--footer .gc-footer-v2-contact--email {
		margin-bottom: 8px !important;
	}

	.et-l--footer .gc-footer-v2-contact::before {
		content: "";
		position: absolute;
		top: 3px;
		left: 0;
		width: 12px;
		height: 12px;
		background-position: center;
		background-repeat: no-repeat;
		background-size: contain;
	}

	.et-l--footer .gc-footer-v2-contact--address::before {
		top: 3px;
		width: 13px;
		height: 13px;
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'%3E%3Cpath d='M12 21s6-5.33 6-11a6 6 0 1 0-12 0c0 5.67 6 11 6 11Z' stroke='%23D6BD14' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M12 12.5A2.5 2.5 0 1 0 12 7.5a2.5 2.5 0 0 0 0 5Z' stroke='%23D6BD14' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
	}

	.et-l--footer .gc-footer-v2-contact--phone::before {
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'%3E%3Cpath d='M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.52 19.52 0 0 1-6-6A19.79 19.79 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.12.92.32 1.82.6 2.68a2 2 0 0 1-.45 2.11L8 9.7a16 16 0 0 0 6.3 6.3l1.19-1.21a2 2 0 0 1 2.11-.45c.86.28 1.76.48 2.68.6A2 2 0 0 1 22 16.92Z' stroke='%23D6BD14' stroke-width='1.9' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
	}

	.et-l--footer .gc-footer-v2-contact--email::before {
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'%3E%3Cpath d='M4 6h16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2Z' stroke='%23D6BD14' stroke-width='1.9' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='m22 8-10 6L2 8' stroke='%23D6BD14' stroke-width='1.9' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
	}

	.et-l--footer .gc-footer-v2-contact--website::before {
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'%3E%3Ccircle cx='12' cy='12' r='9' stroke='%23D6BD14' stroke-width='1.9'/%3E%3Cpath d='M3 12h18M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18' stroke='%23D6BD14' stroke-width='1.9' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
	}

	.et-l--footer .gc-footer-v2-contact .et_pb_module_header,
	.et-l--footer .gc-footer-v2-contact .et_pb_module_header a {
		margin: 0 !important;
		padding: 0 !important;
		color: rgba(255, 255, 255, 0.5);
		font-family: 'Inter', sans-serif;
		font-size: 12px;
		font-weight: 400;
		line-height: 18px;
		text-decoration: none;
	}

	.et-l--footer .gc-footer-v2-contact--address .et_pb_module_header {
		line-height: 19.8px;
	}

	.et-l--footer .gc-footer-v2-contact .et_pb_module_header a:hover,
	.et-l--footer .gc-footer-v2-links a:hover,
	.et-l--footer .gc-footer-v2-legal a:hover {
		color: #ffffff !important;
		opacity: 1;
	}

	.et-l--footer .gc-footer-v2-social-wrap {
		margin-top: 16px !important;
	}

	.et-l--footer .gc-footer-v2-social-wrap > .et_pb_column {
		float: none !important;
		width: auto !important;
		margin: 0 8px 0 0 !important;
	}

	.et-l--footer .gc-footer-v2-social-wrap > .et_pb_column:last-child {
		margin-right: 0 !important;
	}

	.et-l--footer .gc-footer-v2-social-button {
		margin: 0 !important;
	}

	.et-l--footer .gc-footer-v2-social-button.et_pb_button {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		box-sizing: border-box;
		min-height: 28.5px;
		padding: 5px 16px 5px 34px !important;
		border: 1px solid rgba(255, 255, 255, 0.15);
		border-radius: 4px;
		background: transparent;
		color: rgba(255, 255, 255, 0.5) !important;
		font-family: 'Inter', sans-serif;
		font-size: 11px;
		font-weight: 500;
		line-height: 16.5px !important;
		letter-spacing: 0;
		transition: background-color 300ms ease, border-color 300ms ease, color 300ms ease;
	}

	.et-l--footer .gc-footer-v2-social-button.et_pb_button::after {
		display: none !important;
	}

	.et-l--footer .gc-footer-v2-social-button.et_pb_button::before {
		content: "";
		display: block !important;
		position: absolute;
		left: 14px;
		top: 50%;
		width: 12px;
		height: 12px;
		transform: translateY(-50%);
		opacity: 1;
		background-position: center;
		background-repeat: no-repeat;
		background-size: contain;
	}

	.et-l--footer .gc-footer-v2-social-button--facebook.et_pb_button::before {
		background-image: url("https://tender.net/golden-crossec/wp-content/uploads/2026/07/footer-fb.png");
	}

	.et-l--footer .gc-footer-v2-social-button--instagram.et_pb_button::before {
		background-image: url("https://tender.net/golden-crossec/wp-content/uploads/2026/07/footer-insta.png");
	}

	.et-l--footer .gc-footer-v2-social-button.et_pb_button:hover,
	.et-l--footer .gc-footer-v2-social-button.et_pb_button:focus {
		background: rgba(255, 255, 255, 0.1) !important;
		border-color: rgba(255, 255, 255, 0.28) !important;
		color: #ffffff !important;
		padding: 5px 16px 5px 34px !important;
	}

	.et-l--footer .gc-footer-v2-links,
	.et-l--footer .gc-footer-v2-legal,
	.et-l--footer .gc-footer-v2-copyright {
		margin: 0 !important;
	}

	/* Footer link columns (Quick Links / Event Info / The Venue) use Divi's
	   Menu module bound to a real WP menu (Appearance > Menus) so admins can
	   manage them without touching the builder. The module renders its own
	   nav chrome (background, flex row, mobile hamburger) which is reset
	   here to reproduce the original plain stacked-link look exactly. */
	.et-l--footer .gc-footer-v2-links {
		width: 100%;
		background: transparent !important;
		box-shadow: none !important;
		text-align: left !important;
	}

	/* Divi auto-adds responsive alignment classes (et_pb_text_align_right-tablet
	   / -phone) to the Menu module; the footer link columns must stay
	   left-aligned at every breakpoint, matching desktop. */
	.et-l--footer .gc-footer-v2-links.et_pb_text_align_right-tablet,
	.et-l--footer .gc-footer-v2-links.et_pb_text_align_right-phone,
	.et-l--footer .gc-footer-v2-links.et_pb_text_align_center-tablet,
	.et-l--footer .gc-footer-v2-links.et_pb_text_align_center-phone {
		text-align: left !important;
	}

	.et-l--footer .gc-footer-v2-links ul.et-menu,
	.et-l--footer .gc-footer-v2-links ul.et-menu li,
	.et-l--footer .gc-footer-v2-links ul.et-menu li a {
		text-align: left !important;
	}

	.et-l--footer .gc-footer-v2-links .et_pb_menu_inner_container,
	.et-l--footer .gc-footer-v2-links .et_pb_menu__wrap,
	.et-l--footer .gc-footer-v2-links .et_pb_menu__menu,
	.et-l--footer .gc-footer-v2-links .et-menu-nav {
		display: block !important;
		width: 100%;
		background: transparent !important;
		min-height: 0 !important;
	}

	.et-l--footer .gc-footer-v2-links .et_mobile_nav_menu {
		display: none !important;
	}

	.et-l--footer .gc-footer-v2-links ul.et-menu {
		display: block !important;
		margin: 0 !important;
		padding: 0 !important;
		list-style: none !important;
		background: transparent !important;
	}

	.et-l--footer .gc-footer-v2-links ul.et-menu li {
		display: block !important;
		float: none !important;
		margin: 0 0 12px 0 !important;
		padding: 0 !important;
		width: auto !important;
	}

	.et-l--footer .gc-footer-v2-links ul.et-menu li:last-child {
		margin-bottom: 0 !important;
	}

	.et-l--footer .gc-footer-v2-links ul.et-menu li a {
		display: block;
		margin: 0 !important;
		padding: 0 !important;
		border: 0 !important;
		background: transparent !important;
		color: rgba(255, 255, 255, 0.48);
		font-family: 'Inter', sans-serif;
		font-size: 13px;
		font-weight: 400;
		line-height: 21.45px;
		text-decoration: none;
	}

	.et-l--footer .gc-footer-v2-bottom-row {
		align-items: center;
		padding: 22px 0 24px !important;
		border-top: 1px solid rgba(255, 255, 255, 0.07);
	}

	.et-l--footer .gc-footer-v2-bottom-row > .et_pb_column {
		float: none !important;
		margin: 0 !important;
	}

	.et-l--footer .gc-footer-v2-bottom-left,
	.et-l--footer .gc-footer-v2-bottom-right {
		width: 50% !important;
	}

	.et-l--footer .gc-footer-v2-bottom-right {
		text-align: right;
	}

	.et-l--footer .gc-footer-v2-copyright p,
	.et-l--footer .gc-footer-v2-copyright a,
	.et-l--footer .gc-footer-v2-legal p,
	.et-l--footer .gc-footer-v2-legal a {
		margin: 0 !important;
		padding: 0 !important;
		color: rgba(255, 255, 255, 0.25);
		font-family: 'Inter', sans-serif;
		font-size: 11px;
		font-weight: 400;
		line-height: 16.5px;
		text-decoration: none;
	}

	.et-l--footer .gc-footer-v2-legal a + a {
		margin-left: 28px;
	}

	@media (max-width: 980px) {
		.et-l--footer .gc-footer-v2-section {
			padding: 72px 40px 0 !important;
		}

		.et-l--footer .gc-footer-v2-col-primary,
		.et-l--footer .gc-footer-v2-col-links,
		.et-l--footer .gc-footer-v2-col-events,
		.et-l--footer .gc-footer-v2-col-venue {
			width: 50% !important;
			padding-right: 24px !important;
		}

		.et-l--footer .gc-footer-v2-col-events,
		.et-l--footer .gc-footer-v2-col-venue {
			padding-right: 0 !important;
		}

		.et-l--footer .gc-footer-v2-bottom-right {
			margin-top: 12px !important;
		}
	}

	@media (max-width: 767px) {
		.et-l--footer .gc-footer-v2-section {
			padding: 56px 24px 0 !important;
		}

		.et-l--footer .gc-footer-v2-main-row > .et_pb_column,
		.et-l--footer .gc-footer-v2-col-primary,
		.et-l--footer .gc-footer-v2-col-links,
		.et-l--footer .gc-footer-v2-col-events,
		.et-l--footer .gc-footer-v2-col-venue {
			width: 100% !important;
			padding-right: 0 !important;
		}

		.et-l--footer .gc-footer-v2-main-row > .et_pb_column {
			margin-bottom: 34px !important;
		}

		.et-l--footer .gc-footer-v2-brand-logo-col {
			width: 84px !important;
			flex-basis: 84px !important;
		}

		.et-l--footer .gc-footer-v2-brand-logo,
		.et-l--footer .gc-footer-v2-brand-logo .et_pb_image_wrap,
		.et-l--footer .gc-footer-v2-brand-logo img {
			width: 84px;
			height: 84px;
		}

		.et-l--footer .gc-footer-v2-social-wrap > .et_pb_column {
			width: 100% !important;
			margin: 0 0 12px 0 !important;
		}

		.et-l--footer .gc-footer-v2-social-wrap > .et_pb_column:last-child {
			margin-bottom: 0 !important;
		}

		.et-l--footer .gc-footer-v2-social-button.et_pb_button {
			width: 100%;
		}

		.et-l--footer .gc-footer-v2-bottom-row {
			padding-top: 18px !important;
			padding-bottom: 20px !important;
		}
	}
@media (max-width: 560px) {
	.et-l--footer .gc-footer-v2-bottom-left,
		.et-l--footer .gc-footer-v2-bottom-right {
			width: 100% !important;
			text-align: center;
		}
}
	</style>
	<?php
}
add_action( 'wp_head', 'golden_cross_output_footer_v2_css', 130 );
