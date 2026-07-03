<?php
/**
 * Plugin Name: Golden Cross Header V2
 * Description: Aligns the global Divi header with the approved Golden Cross top navigation.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function golden_cross_enqueue_header_v2_fonts() {
	wp_enqueue_style(
		'golden-cross-header-v2-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap',
		array(),
		null
	);
}
add_action( 'wp_enqueue_scripts', 'golden_cross_enqueue_header_v2_fonts' );

// function golden_cross_get_header_v2_social_links() {
// 	$options = get_option( 'et_divi' );

// 	if ( ! is_array( $options ) ) {
// 		return array();
// 	}

// 	$links = array();
// 	$services = array(
// 		'facebook'  => 'facebook_url',
// 		'instagram' => 'instagram_url',
// 	);

// 	foreach ( $services as $service => $option_key ) {
// 		if ( empty( $options[ $option_key ] ) || ! is_string( $options[ $option_key ] ) ) {
// 			continue;
// 		}

// 		$url = esc_url_raw( trim( $options[ $option_key ] ) );

// 		if ( '' !== $url ) {
// 			$links[ $service ] = $url;
// 		}
// 	}

// 	return $links;
// }

function golden_cross_get_header_v2_social_links() {

    $links = array();

    $menu = wp_get_nav_menu_object('social_links');

    if (!$menu) {
        return $links;
    }

    $items = wp_get_nav_menu_items($menu->term_id);

    if (!$items) {
        return $links;
    }

    foreach ($items as $item) {

        $links[] = array(
            'title'   => $item->title,
            'url'     => $item->url,
            'target'  => $item->target ?: '_self',
            'classes' => array_values(array_filter($item->classes)),
        );
    }

    return $links;
}

function golden_cross_output_header_v2_css() {
	?>
	<style id="golden-cross-header-v2-css">
		.home .et-l--header {
		position: absolute !important;}
	.et-l--header {
		top: 0;
		left: 0;
		right: 0;
		z-index: 9999;
		width: 100%;
		background: rgba(18, 21, 58, 0.85) !important;
		transition: background-color 240ms ease, box-shadow 240ms ease, border-color 240ms ease;
	}

	body.admin-bar .et-l--header {
		top: 32px;
	}

	body.gc-header-v2-scrolled .et-l--header {
		position: fixed !important;
		background: rgba(18, 21, 58, 0.85) !important;
		box-shadow: 0 12px 28px rgba(0, 0, 0, 0.22);
	}

	.et-l--header .et_pb_section,
	.et-l--header .et_pb_section.et_pb_section_0_tb_header {
		background: rgba(18, 21, 58, 0.85) !important;
		border: 0 !important;
		box-shadow: none !important;
		padding: 0 !important;
		transition: background-color 240ms ease, box-shadow 240ms ease, border-color 240ms ease;
	}

	body.gc-header-v2-scrolled .et-l--header .et_pb_section,
	body.gc-header-v2-scrolled .et-l--header .et_pb_section.et_pb_section_0_tb_header {
		background: rgba(18, 21, 58, 0.85) !important;
		border-bottom: 1px solid rgba(214, 189, 20, 0.2) !important;
	}

	.et-l--header .et_pb_row_0_tb_header {
		width: 100% !important;
		max-width: 1499px !important;
		margin: 0 auto !important;
		padding: 25px 50px !important;
		display: flex !important;
		align-items: center !important;
		justify-content: space-between !important;
		column-gap: 0 !important;
		transition: padding 240ms ease, min-height 240ms ease;
	}

	.et-l--header .et_pb_row_0_tb_header::after {
		display: none !important;
	}

	.et-l--header .et_pb_row_0_tb_header > .et_pb_column {
		float: none !important;
		margin: 0 !important;
		min-height: 125px !important;
		display: flex !important;
		align-items: center !important;
	}

	.et-l--header .et_pb_column_0_tb_header {
		width: 125px !important;
		flex: 0 0 125px !important;
		justify-content: flex-start !important;
	}

	.et-l--header .et_pb_column_1_tb_header {
		width: auto !important;
		flex: 1 1 auto !important;
		padding-left: 32px !important;
		justify-content: flex-end !important;
	}

	.et-l--header .et_pb_column_2_tb_header {
		width: 88px !important;
		flex: 0 0 88px !important;
		justify-content: flex-end !important;
	}

	.et-l--header .et_pb_module {
		margin-bottom: 0 !important;
	}

	.et-l--header .et_pb_image,
	.et-l--header .et_pb_image .et_pb_image_wrap,
	.et-l--header .et_pb_image img {
		display: block;
		width: 125px;
		height: 125px;
	}

	.et-l--header .et_pb_image img {
		object-fit: cover;
		border-radius: 6px;
	}

	.et-l--header .gc-topnav-contact-menu,
	.et-l--header .gc-topnav-nav-menu,
	.et-l--header .et_pb_menu {
		width: 100%;
		background: transparent !important;
	}

	.et-l--header .gc-topnav-contact-menu .et_pb_menu_inner_container,
	.et-l--header .gc-topnav-nav-menu .et_pb_menu_inner_container {
		display: flex;
		align-items: center;
		justify-content: flex-end;
		min-height: 125px;
	}

	.et-l--header .gc-topnav-contact-menu .et_pb_menu__menu {
		display: block !important;
	}

	.et-l--header .gc-topnav-contact-menu .et_mobile_nav_menu {
		display: none !important;
	}

	.et-l--header .gc-topnav-contact-menu .et-menu-nav,
	.et-l--header .gc-topnav-contact-menu .et-menu {
		display: flex;
		align-items: center;
		justify-content: flex-end;
		gap: 48px;
		margin: 0;
		padding: 0;
		list-style: none;
	}

	.et-l--header .gc-topnav-contact-menu .et-menu > li {
		margin: 0;
		padding: 0;
	}

	.et-l--header .gc-topnav-contact-menu .et-menu > li > a {
		display: inline-flex;
		align-items: center;
		gap: 10px;
		color: #ffffff !important;
		text-decoration: none;
		font-family: 'Inter', sans-serif;
		font-size: 16px;
		font-weight: 400;
		line-height: 1;
		letter-spacing: 0;
		padding: 0 !important;
		white-space: nowrap;
	}

	.et-l--header .gc-topnav-contact-menu .et-menu > li > a::before {
		content: "";
		width: 17px;
		height: 17px;
		flex: 0 0 auto;
		background-position: center;
		background-repeat: no-repeat;
		background-size: contain;
	}

	.et-l--header .gc-topnav-contact-menu .et-menu > li:first-child > a::before {
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'%3E%3Cpath d='M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.52 19.52 0 0 1-6-6A19.79 19.79 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.12.92.32 1.82.6 2.68a2 2 0 0 1-.45 2.11L8 9.7a16 16 0 0 0 6.3 6.3l1.19-1.21a2 2 0 0 1 2.11-.45c.86.28 1.76.48 2.68.6A2 2 0 0 1 22 16.92Z' stroke='%23d6bd14' stroke-width='1.9' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
	}

	.et-l--header .gc-topnav-contact-menu .et-menu > li:last-child > a::before {
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'%3E%3Cpath d='M4 6h16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2Z' stroke='%23d6bd14' stroke-width='1.9' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='m22 8-10 6L2 8' stroke='%23d6bd14' stroke-width='1.9' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
	}

	.et-l--header .gc-topnav-contact-menu .et-menu > li > a:hover {
		opacity: 0.88;
	}

	.et-l--header .gc-topnav-nav-menu .et_pb_menu__menu {
		display: none !important;
	}

	.et-l--header .gc-topnav-nav-menu .et_mobile_nav_menu {
		display: block !important;
	}

	.et-l--header .gc-topnav-nav-menu .mobile_nav {
		display: flex;
		align-items: center;
		justify-content: flex-end;
		padding: 0;
	}

	.et-l--header .gc-topnav-nav-menu .mobile_menu_bar {
		padding: 0;
	}

	.et-l--header .gc-topnav-nav-menu .mobile_menu_bar::before {
		color: #ffffff !important;
		font-size: 40px !important;
		line-height: 1 !important;
	}

	.et-l--header .gc-topnav-nav-menu .select_page {
		display: none !important;
	}

	.et-l--header .gc-topnav-nav-menu .et_mobile_menu {
		top: calc(100% + 20px);
		right: 0;
		left: auto;
		width: 240px;
		background: #12153a !important;
		border-top: 1px solid rgba(214, 189, 20, 0.18) !important;
	}

	.et-l--header .gc-topnav-nav-menu .et_mobile_menu li a {
		color: #ffffff !important;
		font-family: 'Inter', sans-serif;
		font-size: 15px;
		font-weight: 500;
		letter-spacing: 0;
	}

	.et-l--header .gc-topnav-nav-menu .et_mobile_menu li a:hover {
		color: #d6bd14 !important;
		background: rgba(255, 255, 255, 0.04);
	}

	body.gc-mobile-drawer-ready.gc-mobile-drawer-locked {
		position: fixed;
		left: 0;
		right: 0;
		width: 100%;
		overflow: hidden;
	}

	body.gc-mobile-drawer-ready .gc-topnav-nav-menu .et_pb_menu__wrap {
		position: relative;
	}

	body.gc-mobile-drawer-ready .gc-topnav-nav-menu .mobile_nav {
		cursor: pointer;
	}

	body.gc-mobile-drawer-ready .gc-topnav-nav-menu .mobile_nav:focus-visible,
	body.gc-mobile-drawer-ready .gc-mobile-drawer__close:focus-visible,
	body.gc-mobile-drawer-ready .gc-mobile-drawer__social-link:focus-visible,
	body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu a:focus-visible {
		outline: 2px solid #d6bd14;
		outline-offset: 3px;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer-overlay {
		position: fixed;
		inset: 0;
		background: rgba(18, 21, 58, 0.75);
		opacity: 0;
		visibility: hidden;
		pointer-events: none;
		transition: opacity 300ms ease-in-out, visibility 0s linear 300ms;
		z-index: 100000;
		cursor: pointer;
		will-change: opacity;
		border: 0;
		padding: 0;
		margin: 0;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer {
		position: fixed;
		top: 0;
		left: 0;
		bottom: 0;
		width: 380px;
		max-width: 100vw;
		height: 100vh;
		background: #12153a;
		box-shadow: 28px 0 48px rgba(0, 0, 0, 0.34);
		transform: translateX(-100%);
		visibility: hidden;
		transition: transform 300ms ease-in-out, visibility 0s linear 300ms;
		z-index: 100001;
		will-change: transform;
	}

	body.gc-mobile-drawer-ready.gc-mobile-drawer-open .gc-mobile-drawer-overlay {
		opacity: 1;
		visibility: visible;
		pointer-events: auto;
		transition: opacity 300ms ease-in-out;
	}

	body.gc-mobile-drawer-ready.gc-mobile-drawer-open .gc-mobile-drawer {
		transform: translateX(0);
		visibility: visible;
		transition: transform 300ms ease-in-out;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer__inner {
		display: flex;
		flex-direction: column;
		height: 100%;
		padding: env(safe-area-inset-top, 0px) 0 max(18px, env(safe-area-inset-bottom, 0px));
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer__header {
		position: relative;
		display: flex;
		flex-direction: column;
		align-items: center;
		gap: 14px;
		padding: 48px 28px 33px;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer__close {
		position: absolute;
		top: 20px;
		right: 20px;
		display: inline-flex;
		align-items: center;
		justify-content: center;
		width: 40px;
		height: 40px;
		border: 1px solid rgba(255, 255, 255, 0.15);
		border-radius: 20px;
		background: transparent;
		color: rgba(255, 255, 255, 0.74);
		font-family: 'Inter', sans-serif;
		font-size: 21px;
		line-height: 1;
		cursor: pointer;
		transition: color 180ms ease, border-color 180ms ease, background-color 180ms ease;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer__close:hover {
		color: #ffffff;
		border-color: rgba(214, 189, 20, 0.55);
		background: rgba(255, 255, 255, 0.05);
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer__brand {
		display: inline-flex;
		flex-direction: column;
		align-items: center;
		gap: 14px;
		text-decoration: none;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer__brand img {
		display: block;
		width: 150px;
		height: 150px;
		border-radius: 10px;
		object-fit: cover;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer__brand-title {
		display: flex;
		flex-direction: column;
		align-items: center;
		color: #ffffff;
		font-family: 'Playfair Display', serif;
		font-size: 15px;
		font-weight: 700;
		line-height: 21px;
		text-align: center;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer__brand-title-line {
		display: block;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer__section-divider {
		position: relative;
		padding: 0 32px;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer__section-divider::before {
		content: "";
		display: block;
		width: 100%;
		border-top: 1px solid rgba(255, 255, 255, 0.08);
	}

	/* Figma Nav-Menu (59:689) uses a plain rgba(255,255,255,0.08) rule with no
	   gold accent chip. */
	body.gc-mobile-drawer-ready .gc-mobile-drawer__section-divider span {
		display: none;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer__section-divider {
		padding: 0;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer__menu-wrap {
		flex: 1 1 auto;
		overflow-y: auto;
		padding: 16px 24px 26px;
		scrollbar-width: thin;
		scrollbar-color: rgba(214, 189, 20, 0.5) transparent;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu {
		position: static;
		top: auto;
		right: auto;
		left: auto;
		width: 100%;
		display: block !important;
		margin: 0;
		padding: 0;
		background: transparent !important;
		border: 0 !important;
		box-shadow: none;
		list-style: none;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu li {
		padding: 0;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu > li + li {
		margin-top: 0;
	}

	/* Figma Nav-Menu items (59:696-59:732): 50px tall, Inter Medium 16px/24px,
	   3px left border, rounded right corners only. */
	body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu > li > a {
		display: block;
		position: relative;
		padding: 13px 44px 13px 19px;
		border-left: 3px solid transparent;
		border-radius: 0 4px 4px 0;
		color: rgba(255, 255, 255, 0.82) !important;
		background: transparent;
		font-family: 'Inter', sans-serif;
		font-size: 16px;
		font-weight: 500;
		line-height: 24px;
		letter-spacing: 0;
		transition: color 180ms ease, background-color 180ms ease, border-color 180ms ease;
	}

	/* WP flags same-page anchor links (menu-item-object-custom) as current too;
	   only the real page item should render as active, per Figma. */
	body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu > li.current-menu-item:not(.menu-item-object-custom) > a,
	body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu > li.current_page_item:not(.menu-item-object-custom) > a {
		padding-left: 16px;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu > li.current-menu-item:not(.menu-item-object-custom) > a,
	body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu > li.current_page_item:not(.menu-item-object-custom) > a,
	body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu > li > a:hover {
		color: #d6bd14 !important;
		background: rgba(214, 189, 20, 0.06);
		border-left-color: #d6bd14;
	}

	/* Figma submenu (59:706-59:708): 16px indent, 2px gold-20% rail, 34px text inset. */
	body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu .sub-menu {
		margin: 0 0 0 16px;
		padding: 0 0 0 34px;
		border-left: 2px solid rgba(214, 189, 20, 0.2);
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu .menu-item-has-children:not(.gc-submenu-open) > .sub-menu {
		display: none;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu .sub-menu li + li {
		margin-top: 0;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu .sub-menu a {
		display: block;
		padding: 10px 0;
		color: rgba(255, 255, 255, 0.55) !important;
		font-family: 'Inter', sans-serif;
		font-size: 13.5px;
		font-weight: 400;
		line-height: 20.25px;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu .menu-item-has-children > a:first-child::after {
		content: "3";
		position: absolute;
		top: 50%;
		right: 16px;
		font-family: ETmodules;
		font-size: 15px;
		line-height: 1;
		color: rgba(255, 255, 255, 0.68);
		transform: translateY(-50%) rotate(0deg);
		transition: transform 180ms ease;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu .menu-item-has-children.gc-submenu-open > a:first-child::after {
		transform: translateY(-50%) rotate(180deg);
	}

	/* Figma Nav-Menu footer (59:733-59:739): 25/24px padding, 44px circles,
	   17px icons, 12px gap. */
	body.gc-mobile-drawer-ready .gc-mobile-drawer__footer {
		padding: 25px 24px 0;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer__socials {
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 12px;
		padding-top: 20px;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer__social-link,
	body.gc-mobile-drawer-ready .gc-mobile-drawer__social-icon {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		width: 44px;
		height: 44px;
		border: 1px solid rgba(255, 255, 255, 0.15);
		border-radius: 22px;
		color: rgba(255, 255, 255, 0.82);
		text-decoration: none;
		transition: background-color 180ms ease, border-color 180ms ease, color 180ms ease;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer__social-link:hover {
		background: rgba(255, 255, 255, 0.08);
		border-color: rgba(214, 189, 20, 0.45);
		color: #ffffff;
	}

	body.gc-mobile-drawer-ready .gc-mobile-drawer__social-link svg,
	body.gc-mobile-drawer-ready .gc-mobile-drawer__social-icon svg {
		display: block;
		width: 17px;
		height: 17px;
	}

	@media (max-width: 980px) {
		.et-l--header .et_pb_row_0_tb_header {
			padding: 20px 24px !important;
		}

		.et-l--header .et_pb_row_0_tb_header > .et_pb_column {
			min-height: 96px !important;
		}

		.et-l--header .et_pb_column_1_tb_header {
			display: none !important;
		}

		.et-l--header .et_pb_column_0_tb_header {
			width: 104px !important;
			flex-basis: 104px !important;
		}

		.et-l--header .et_pb_image,
		.et-l--header .et_pb_image .et_pb_image_wrap,
		.et-l--header .et_pb_image img {
			width: 104px;
			height: 104px;
		}

		.et-l--header .gc-topnav-nav-menu .et_pb_menu_inner_container {
			min-height: 96px;
		}

		body.gc-mobile-drawer-ready .gc-mobile-drawer {
			width: 380px;
		}
	}

	@media (max-width: 767px) {
		.et-l--header .et_pb_row_0_tb_header {
			padding: 16px 20px !important;
		}

		.et-l--header .et_pb_row_0_tb_header > .et_pb_column {
			min-height: 84px !important;
		}

		.et-l--header .et_pb_column_0_tb_header {
			width: 88px !important;
			flex-basis: 88px !important;
		}

		.et-l--header .et_pb_column_2_tb_header {
			width: 32px !important;
			flex-basis: 32px !important;
		}

		.et-l--header .et_pb_image,
		.et-l--header .et_pb_image .et_pb_image_wrap,
		.et-l--header .et_pb_image img {
			width: 88px;
			height: 88px;
		}

		.et-l--header .gc-topnav-nav-menu .et_pb_menu_inner_container {
			min-height: 84px;
		}

		.et-l--header .gc-topnav-nav-menu .mobile_menu_bar::before {
			font-size: 34px !important;
		}

		body.gc-mobile-drawer-ready .gc-mobile-drawer {
			width: 100vw;
		}

		body.gc-mobile-drawer-ready .gc-mobile-drawer__header {
			padding-right: 24px;
			padding-left: 24px;
		}

		body.gc-mobile-drawer-ready .gc-mobile-drawer__section-divider,
		body.gc-mobile-drawer-ready .gc-mobile-drawer__menu-wrap,
		body.gc-mobile-drawer-ready .gc-mobile-drawer__footer {
			padding-left: 24px;
			padding-right: 24px;
		}

		body.gc-mobile-drawer-ready .gc-mobile-drawer .et_mobile_menu > li > a {
			padding-right: 40px;
			font-size: 15px;
		}
	}

	@media (max-width: 782px) {
		body.admin-bar .et-l--header {
			top: 46px;
		}
	}
	@media (max-width: 500px) {
    .et_pb_section_sticky .et_pb_row.et-last-child,
    .et_pb_section_sticky .et_pb_row:last-child {
        flex-direction: column;
        gap: 12px;
    }
    .et-l--header .gc-topnav-contact-menu .et_pb_menu_inner_container,
    .et-l--header .gc-topnav-nav-menu .et_pb_menu_inner_container {
        min-height: 35px;
        justify-content: center;
    }
    .et-l--header .gc-topnav-contact-menu .et-menu-nav,
    .et-l--header .gc-topnav-contact-menu .et-menu {
        gap: 12px;
        justify-content: center;
    }
    .et-l--header .et_pb_row_0_tb_header > .et_pb_column {
        min-height: 0px !important;
        padding-left: 0 !important;
    }
	.home .et-l--header {
		position: relative !important;
	}
	body.gc-header-v2-scrolled .et-l--header{
		position: relative !important;
	}
}

	</style>
	<?php
}
add_action( 'wp_head', 'golden_cross_output_header_v2_css', 130 );

function golden_cross_output_header_v2_script() {
	$social_links = golden_cross_get_header_v2_social_links();
	?>
	<script id="golden-cross-header-v2-js">
	(function () {
		var scrolledClass = 'gc-header-v2-scrolled';
		var drawerReadyClass = 'gc-mobile-drawer-ready';
		var drawerOpenClass = 'gc-mobile-drawer-open';
		var drawerLockedClass = 'gc-mobile-drawer-locked';
		var drawerId = 'gc-mobile-drawer';
		var overlayId = 'gc-mobile-drawer-overlay';
		var transitionDuration = 300;
		var socialLinks = <?php echo wp_json_encode( $social_links ); ?>;
		var ticking = false;
		var closeTimer = null;
		var scrollPosition = 0;
		var activeTrigger = null;
		// var defaultSocialServices = ['facebook', 'instagram'];
		var drawerBound = false;
		var drawerRetries = 0;
		var drawerRetryTimer = null;
		var maxDrawerRetries = 50;

		function createElement(tagName, className) {
			var element = document.createElement(tagName);

			if (className) {
				element.className = className;
			}

			return element;
		}

		function getFocusableElements(container) {
			return Array.prototype.slice.call(
				container.querySelectorAll(
					'a[href], area[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'
				)
			).filter(function (element) {
				return (
					!element.hasAttribute('hidden') &&
					element.getAttribute('aria-hidden') !== 'true' &&
					!!(element.offsetWidth || element.offsetHeight || element.getClientRects().length)
				);
			});
		}

		function getBrandNameParts(brandName) {
			var trimmed = (brandName || '').trim();
			var suffix = 'Equestrian Centre';

			if (!trimmed) {
				return ['Golden Cross', suffix];
			}

			if (trimmed.slice(-suffix.length) === suffix) {
				var prefix = trimmed.slice(0, -suffix.length).trim();

				return [prefix || 'Golden Cross', suffix];
			}

			var parts = trimmed.split(/\s+/);

			if (parts.length > 2) {
				return [parts.slice(0, 2).join(' '), parts.slice(2).join(' ')];
			}

			return [trimmed, ''];
		}

		// function createSocialIcon(service) {
		// 	var svgMarkup = {
		// 		facebook: '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M13.5 22v-8.2h2.8l.42-3.2h-3.22V8.56c0-.93.27-1.56 1.63-1.56H17V4.14c-.31-.04-1.36-.14-2.59-.14-2.56 0-4.31 1.56-4.31 4.43v2.17H7.2v3.2h2.9V22h3.4Z"/></svg>',
		// 		instagram: '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M12 7.1A4.9 4.9 0 1 0 16.9 12 4.9 4.9 0 0 0 12 7.1Zm0 8.05A3.15 3.15 0 1 1 15.15 12 3.15 3.15 0 0 1 12 15.15ZM18.24 6.9a1.14 1.14 0 1 1-1.14-1.14 1.14 1.14 0 0 1 1.14 1.14Zm3.23 1.15c-.07-1.49-.41-2.8-1.5-3.88S17.58 2.74 16.1 2.67C14.57 2.58 9.43 2.58 7.9 2.67 6.42 2.74 5.11 3.08 4.03 4.17S2.6 6.42 2.53 7.9c-.09 1.53-.09 6.67 0 8.2.07 1.48.41 2.79 1.5 3.88s2.39 1.43 3.87 1.5c1.53.09 6.67.09 8.2 0 1.48-.07 2.79-.41 3.87-1.5s1.43-2.4 1.5-3.88c.09-1.53.09-6.67 0-8.2Zm-2.08 9.96a3.13 3.13 0 0 1-1.77 1.77c-1.23.49-4.15.38-5.62.38s-4.4.11-5.62-.38a3.13 3.13 0 0 1-1.77-1.77c-.49-1.23-.38-4.15-.38-5.62s-.11-4.4.38-5.62a3.13 3.13 0 0 1 1.77-1.77c1.22-.49 4.15-.38 5.62-.38s4.39-.11 5.62.38a3.13 3.13 0 0 1 1.77 1.77c.49 1.22.38 4.15.38 5.62s.11 4.39-.38 5.62Z"/></svg>'
		// 	};

		// 	return svgMarkup[service] || '';
		// }

		function lockBodyScroll() {
			scrollPosition = window.scrollY || window.pageYOffset || document.documentElement.scrollTop || 0;
			document.body.classList.add(drawerLockedClass);
			document.body.style.top = (-1 * scrollPosition) + 'px';
		}

		function unlockBodyScroll() {
			document.body.classList.remove(drawerLockedClass);
			document.body.style.top = '';
			window.scrollTo(0, scrollPosition);
		}

		function setDrawerToggleState(toggle, isOpen) {
			toggle.classList.toggle('opened', isOpen);
			toggle.classList.toggle('closed', !isOpen);
			toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
			toggle.setAttribute('aria-label', isOpen ? 'Close menu' : 'Open menu');
		}

		function removeDuplicateIds(element) {
			Array.prototype.slice.call(element.querySelectorAll('[id]')).forEach(function (child) {
				child.removeAttribute('id');
			});

			element.removeAttribute('id');
		}

		function getDrawerMenuRoot(menuModule) {
			var mobileMenuRoot = menuModule.querySelector('.et_mobile_menu');
			var desktopMenuRoot;
			var fallbackMenuRoot;

			if (mobileMenuRoot) {
				return mobileMenuRoot;
			}

			desktopMenuRoot = menuModule.querySelector('.et_pb_menu__menu .et-menu');

			if (!desktopMenuRoot) {
				return null;
			}

			fallbackMenuRoot = desktopMenuRoot.cloneNode(true);
			removeDuplicateIds(fallbackMenuRoot);
			fallbackMenuRoot.classList.remove('et-menu', 'nav', 'downwards');
			fallbackMenuRoot.classList.add('et_mobile_menu', 'gc-mobile-drawer__fallback-menu');
			fallbackMenuRoot.setAttribute('data-gc-fallback-menu', 'true');

			return fallbackMenuRoot;
		}

		function getDirectChildByClass(element, className) {
			var children = Array.prototype.slice.call(element.children || []);

			for (var i = 0; i < children.length; i += 1) {
				if (children[i].classList && children[i].classList.contains(className)) {
					return children[i];
				}
			}

			return null;
		}

		function getDirectChildLink(element) {
			var children = Array.prototype.slice.call(element.children || []);

			for (var i = 0; i < children.length; i += 1) {
				if ('A' === children[i].tagName) {
					return children[i];
				}
			}

			return null;
		}

		function setupDrawerAccordion(menuRoot) {
			Array.prototype.slice.call(menuRoot.querySelectorAll('li')).forEach(function (item) {
				var submenu = getDirectChildByClass(item, 'sub-menu');
				var link = getDirectChildLink(item);
				var isOpen = item.classList.contains('current-menu-ancestor') || item.classList.contains('current-menu-parent');

				if (!submenu || !link) {
					return;
				}

				item.classList.add('menu-item-has-children');
				item.classList.toggle('gc-submenu-open', isOpen);
				link.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
			});
		}

		function createDrawer(menuModule) {
			var menuWrap = menuModule.querySelector('.et_pb_menu__wrap');
			var mobileToggle = menuModule.querySelector('.et_mobile_nav_menu .mobile_nav');
			var menuRoot = getDrawerMenuRoot(menuModule);
			var logoLink = document.querySelector('.et-l--header .et_pb_image a');
			var logoImage = document.querySelector('.et-l--header .et_pb_image img');
			var drawer;
			var drawerInner;
			var drawerHeader;
			var closeButton;
			var brand;
			var brandTitle;
			var brandLineOne;
			var brandLineTwo;
			var divider;
			var dividerAccent;
			var menuWrapInner;
			var overlay;
			var socialServices;

			if (!menuWrap || !mobileToggle || !menuRoot || document.getElementById(drawerId)) {
				return null;
			}

			drawer = createElement('div', 'gc-mobile-drawer');
			drawer.id = drawerId;
			drawer.tabIndex = -1;
			drawer.setAttribute('aria-hidden', 'true');
			drawer.setAttribute('aria-label', 'Site navigation');
			drawer.setAttribute('aria-modal', 'true');
			drawer.setAttribute('role', 'dialog');

			drawerInner = createElement('div', 'gc-mobile-drawer__inner');
			drawerHeader = createElement('div', 'gc-mobile-drawer__header');
			closeButton = createElement('button', 'gc-mobile-drawer__close');
			closeButton.type = 'button';
			closeButton.setAttribute('aria-label', 'Close menu');
			closeButton.innerHTML = '<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.75 4.25L4.25 12.75" stroke="white" stroke-opacity="0.65" stroke-width="1.41667" stroke-linecap="round" stroke-linejoin="round" /><path d="M4.25 4.25L12.75 12.75" stroke="white" stroke-opacity="0.65" stroke-width="1.41667" stroke-linecap="round" stroke-linejoin="round" /></svg>';

			brand = createElement('a', 'gc-mobile-drawer__brand');
			brand.href = logoLink ? logoLink.href : window.location.origin + '/';

			if (logoImage) {
				brand.appendChild(logoImage.cloneNode(true));
			}

			brandTitle = createElement('span', 'gc-mobile-drawer__brand-title');
			brandLineOne = createElement('span', 'gc-mobile-drawer__brand-title-line');
			brandLineTwo = createElement('span', 'gc-mobile-drawer__brand-title-line');

			(function () {
				var parts = getBrandNameParts(logoImage ? logoImage.alt : '');
				brandLineOne.textContent = parts[0];
				brandLineTwo.textContent = parts[1];
			})();

			brandTitle.appendChild(brandLineOne);

			if (brandLineTwo.textContent) {
				brandTitle.appendChild(brandLineTwo);
			}

			brand.appendChild(brandTitle);
			drawerHeader.appendChild(closeButton);
			drawerHeader.appendChild(brand);

			divider = createElement('div', 'gc-mobile-drawer__section-divider');
			dividerAccent = createElement('span');
			dividerAccent.setAttribute('aria-hidden', 'true');
			divider.appendChild(dividerAccent);

			menuWrapInner = createElement('div', 'gc-mobile-drawer__menu-wrap');
			menuWrapInner.appendChild(menuRoot);
			setupDrawerAccordion(menuRoot);

			drawerInner.appendChild(drawerHeader);
			drawerInner.appendChild(divider);
			drawerInner.appendChild(menuWrapInner);

			// socialServices = Object.keys(socialLinks || {});

			// defaultSocialServices.forEach(function (service) {
			// 	if (socialServices.indexOf(service) === -1) {
			// 		socialServices.push(service);
			// 	}
			// });

			// if (socialServices.length) {
			// 	var footer = createElement('div', 'gc-mobile-drawer__footer');
			// 	var footerDivider = createElement('div', 'gc-mobile-drawer__section-divider');
			// 	var footerDividerAccent = createElement('span');
			// 	var socials = createElement('div', 'gc-mobile-drawer__socials');

			// 	footerDividerAccent.setAttribute('aria-hidden', 'true');
			// 	footerDivider.appendChild(footerDividerAccent);
			// 	footer.appendChild(footerDivider);

			// 	// socialServices.forEach(function (service) {
			// 	// 	var link = socialLinks[service]
			// 	// 		? createElement('a', 'gc-mobile-drawer__social-link')
			// 	// 		: createElement('span', 'gc-mobile-drawer__social-icon');
			// 	// 	var iconMarkup = createSocialIcon(service);

			// 	// 	if (!iconMarkup) {
			// 	// 		return;
			// 	// 	}

			// 	// 	if (socialLinks[service]) {
			// 	// 		link.href = socialLinks[service];
			// 	// 		link.target = '_blank';
			// 	// 		link.rel = 'noopener noreferrer';
			// 	// 		link.setAttribute('aria-label', 'Visit our ' + service + ' page');
			// 	// 	} else {
			// 	// 		link.setAttribute('aria-hidden', 'true');
			// 	// 	}

			// 	// 	link.innerHTML = iconMarkup;
			// 	// 	socials.appendChild(link);
			// 	// });

			// 	if (socials.children.length) {
			// 		footer.appendChild(socials);
			// 		drawerInner.appendChild(footer);
			// 	}
			// }

			if (socialLinks.length) {

				var footer = createElement('div', 'gc-mobile-drawer__footer');

				var footerDivider = createElement(
					'div',
					'gc-mobile-drawer__section-divider'
				);

				footer.appendChild(footerDivider);

				var socials = createElement(
					'div',
					'gc-mobile-drawer__socials'
				);

						socialLinks.forEach(function(item) {

						var link = createElement(
							'a',
							'gc-mobile-drawer__social-link'
						);

						link.href = item.url;
						link.target = item.target || '_self';
						link.rel = 'noopener noreferrer';
						link.title = item.title;
						link.setAttribute('aria-label', item.title);

						var icon = createElement(
							'span',
							'gc-mobile-drawer__social-icon'
						);

						var iconMarkup = '';

						if (item.classes.includes('fb_link')) {

							iconMarkup = `
							<svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M4.95801 4.25C4.95801 3.87428 5.10737 3.51372 5.37305 3.24805C5.63872 2.98237 5.99928 2.83301 6.375 2.83301H7.79102V1.41602H6.375C5.62355 1.41602 4.90245 1.71474 4.37109 2.24609C3.83974 2.77745 3.54102 3.49855 3.54102 4.25V6.375C3.54084 6.76605 3.2241 7.08301 2.83301 7.08301H1.41602V8.5H2.83301C3.22421 8.5 3.54102 8.81681 3.54102 9.20801V14.166H4.95801V9.20801C4.95801 8.81691 5.27496 8.50018 5.66602 8.5H7.23828L7.59277 7.08301H5.66602C5.27507 7.08283 4.95818 6.76594 4.95801 6.375V4.25ZM6.375 5.66602H8.5C8.71785 5.66612 8.92344 5.76685 9.05762 5.93848C9.19185 6.1104 9.23943 6.33527 9.18652 6.54688L8.47852 9.37988C8.39966 9.69517 8.11602 9.91602 7.79102 9.91602H6.375V14.875C6.37482 15.2661 6.05711 15.583 5.66602 15.583H2.83301C2.44191 15.583 2.12518 15.2661 2.125 14.875V9.91602H0.708008C0.316806 9.91602 0 9.59921 0 9.20801V6.375C0 5.9838 0.316806 5.66602 0.708008 5.66602H2.125V4.25C2.125 3.12283 2.57211 2.04117 3.36914 1.24414C4.16617 0.447111 5.24783 0 6.375 0H8.5C8.89105 0.000176031 9.20801 0.316915 9.20801 0.708008V3.54102C9.20801 3.93211 8.89105 4.24982 8.5 4.25H6.375V5.66602Z" fill="white" fill-opacity="0.7"/>
							</svg>`;
						}

						else if (item.classes.includes('insta_link')) {

							iconMarkup = `
							<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M14.8746 4.95865C14.8746 3.39384 13.6064 2.12466 12.0416 2.12466H4.95862C3.39381 2.12466 2.12463 3.39384 2.12463 4.95865V12.0417C2.12463 13.6065 3.39381 14.8747 4.95862 14.8747H12.0416C13.6064 14.8747 14.8746 13.6065 14.8746 12.0417V4.95865ZM16.2916 12.0417C16.2916 14.3889 14.3888 16.2917 12.0416 16.2917H4.95862C2.61141 16.2917 0.708618 14.3889 0.708618 12.0417V4.95865C0.708618 2.61144 2.61141 0.708649 4.95862 0.708649H12.0416C14.3888 0.708649 16.2916 2.61144 16.2916 4.95865V12.0417Z" fill="white" fill-opacity="0.7"/>
								<path d="M6.89949 5.32548C7.56061 4.98246 8.31312 4.85692 9.04988 4.96611C9.80153 5.07757 10.4979 5.42782 11.0352 5.96513C11.5724 6.50235 11.9228 7.19805 12.0343 7.94951C12.1435 8.68639 12.017 9.43965 11.6739 10.1009C11.3308 10.7619 10.7884 11.2983 10.1231 11.6331C9.45772 11.968 8.70333 12.0845 7.96785 11.9661C7.2325 11.8477 6.55314 11.5005 6.02644 10.9739C5.49981 10.4473 5.15269 9.7678 5.03426 9.03252C4.91591 8.29707 5.03238 7.54263 5.36727 6.87724C5.70218 6.21183 6.23826 5.66858 6.89949 5.32548ZM8.84285 6.36748C8.40072 6.30191 7.94857 6.37744 7.55184 6.5833C7.15522 6.78913 6.83382 7.11484 6.63289 7.51396C6.43194 7.9132 6.36169 8.36565 6.43269 8.80693C6.5037 9.24822 6.71235 9.65592 7.0284 9.97197C7.34443 10.2879 7.75222 10.4967 8.19344 10.5677C8.6346 10.6386 9.08728 10.5684 9.48641 10.3675C9.88543 10.1666 10.2113 9.84505 10.4171 9.44853C10.6229 9.05179 10.6985 8.59965 10.6329 8.15752C10.566 7.70664 10.3555 7.28942 10.0333 6.96709C9.71101 6.64481 9.29366 6.43443 8.84285 6.36748Z" fill="white" fill-opacity="0.7"/>
								<path d="M12.4027 3.89615C12.7939 3.89615 13.1117 4.21295 13.1117 4.60416C13.1117 4.99536 12.7939 5.31216 12.4027 5.31216H12.3959C12.0047 5.31216 11.6879 4.99536 11.6879 4.60416C11.6879 4.21295 12.0047 3.89615 12.3959 3.89615H12.4027Z" fill="white" fill-opacity="0.7"/>
							</svg>`;
						}

						if (!iconMarkup) {
							return;
						}

						icon.innerHTML = iconMarkup;

						link.appendChild(icon);

						socials.appendChild(link);

					});

				footer.appendChild(socials);

				drawerInner.appendChild(footer);

			}

			drawer.appendChild(drawerInner);
			document.body.appendChild(drawer);

			overlay = createElement('div', 'gc-mobile-drawer-overlay');
			overlay.id = overlayId;
			overlay.setAttribute('aria-hidden', 'true');
			document.body.appendChild(overlay);

			mobileToggle.setAttribute('aria-controls', drawerId);
			mobileToggle.setAttribute('aria-expanded', 'false');
			mobileToggle.setAttribute('aria-haspopup', 'dialog');
			mobileToggle.setAttribute('aria-label', 'Open menu');
			mobileToggle.setAttribute('role', 'button');
			mobileToggle.setAttribute('tabindex', '0');

			return {
				drawer: drawer,
				closeButton: closeButton,
				menuRoot: menuRoot,
				mobileToggle: mobileToggle,
				overlay: overlay
			};
		}

		function bindDrawer(menuModule) {
			var parts = createDrawer(menuModule);

			if (!parts) {
				return;
			}

			function closeDrawer(options) {
				var settings = options || {};

				if (!document.body.classList.contains(drawerOpenClass)) {
					return;
				}

				document.body.classList.remove(drawerOpenClass);
				parts.drawer.setAttribute('aria-hidden', 'true');
				setDrawerToggleState(parts.mobileToggle, false);
				document.removeEventListener('keydown', handleKeydown, true);

				if (closeTimer) {
					window.clearTimeout(closeTimer);
				}

				closeTimer = window.setTimeout(function () {
					unlockBodyScroll();
					closeTimer = null;

					if (settings.restoreFocus !== false && activeTrigger) {
						activeTrigger.focus();
					}
				}, transitionDuration);
			}

			function trapFocus(event) {
				var focusable = getFocusableElements(parts.drawer);
				var first;
				var last;

				if (!focusable.length || event.key !== 'Tab') {
					return;
				}

				first = focusable[0];
				last = focusable[focusable.length - 1];

				if (event.shiftKey && document.activeElement === first) {
					event.preventDefault();
					last.focus();
				} else if (!event.shiftKey && document.activeElement === last) {
					event.preventDefault();
					first.focus();
				}
			}

			function handleKeydown(event) {
				if (!document.body.classList.contains(drawerOpenClass)) {
					return;
				}

				if (event.key === 'Escape') {
					event.preventDefault();
					closeDrawer();
					return;
				}

				trapFocus(event);
			}

			function openDrawer(trigger) {
				var focusable;

				if (document.body.classList.contains(drawerOpenClass)) {
					return;
				}

				if (closeTimer) {
					window.clearTimeout(closeTimer);
					closeTimer = null;
				}

				activeTrigger = trigger || parts.mobileToggle;
				lockBodyScroll();
				document.body.classList.add(drawerOpenClass);
				parts.drawer.setAttribute('aria-hidden', 'false');
				setDrawerToggleState(parts.mobileToggle, true);
				document.addEventListener('keydown', handleKeydown, true);

				focusable = getFocusableElements(parts.drawer);

				window.setTimeout(function () {
					if (focusable.length) {
						focusable[0].focus();
					} else {
						parts.drawer.focus();
					}
				}, 20);
			}

			function toggleDrawer(event) {
				event.preventDefault();
				event.stopPropagation();

				if (document.body.classList.contains(drawerOpenClass)) {
					closeDrawer();
				} else {
					openDrawer(event.currentTarget);
				}
			}

			parts.mobileToggle.addEventListener('click', toggleDrawer, true);
			parts.mobileToggle.addEventListener('keydown', function (event) {
				if (event.key === 'Enter' || event.key === ' ') {
					toggleDrawer(event);
				}
			}, true);

			parts.closeButton.addEventListener('click', function () {
				closeDrawer();
			});

			parts.overlay.addEventListener('click', function () {
				closeDrawer();
			});

			parts.menuRoot.addEventListener('click', function (event) {
				var clickedElement = event.target && 1 === event.target.nodeType ? event.target : event.target.parentElement;
				var link = clickedElement && clickedElement.closest ? clickedElement.closest('a') : null;
				var parentItem;
				var submenu;
				var isOpen;

				if (!link) {
					return;
				}

				parentItem = link.parentElement;

				if (parentItem && parentItem.classList.contains('menu-item-has-children')) {
					submenu = getDirectChildByClass(parentItem, 'sub-menu');

					if (submenu) {
						event.preventDefault();
						event.stopPropagation();
						isOpen = !parentItem.classList.contains('gc-submenu-open');
						parentItem.classList.toggle('gc-submenu-open', isOpen);
						link.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
					}

					return;
				}

				closeDrawer({ restoreFocus: false });
			});

			return true;
		}

		function syncHeaderState() {
			document.body.classList.toggle(scrolledClass, window.scrollY > 12);
			ticking = false;
		}

		function requestSync() {
			if (!ticking) {
				window.requestAnimationFrame(syncHeaderState);
				ticking = true;
			}
		}

		function initDrawer() {
			var menuModule = document.querySelector('.et-l--header .gc-topnav-nav-menu');

			if (drawerBound) {
				return true;
			}

			if (!menuModule) {
				return false;
			}

			if (bindDrawer(menuModule)) {
				document.body.classList.add(drawerReadyClass);
				drawerBound = true;
				return true;
			}

			return false;
		}

		function scheduleDrawerInit() {
			if (drawerBound || drawerRetryTimer) {
				return;
			}

			drawerRetryTimer = window.setTimeout(function () {
				drawerRetryTimer = null;

				if (initDrawer()) {
					return;
				}

				drawerRetries += 1;

				if (drawerRetries < maxDrawerRetries) {
					scheduleDrawerInit();
				}
			}, 100);
		}

		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', function () {
				syncHeaderState();
				scheduleDrawerInit();
			});
		} else {
			syncHeaderState();
			scheduleDrawerInit();
		}

		window.addEventListener('scroll', requestSync, { passive: true });
		window.addEventListener('resize', requestSync);
		window.addEventListener('load', scheduleDrawerInit);

		if (window.jQuery) {
			window.jQuery(window).on('et_pb_init_modules', scheduleDrawerInit);
		}
	})();
	</script>
	<?php
}
add_action( 'wp_footer', 'golden_cross_output_header_v2_script', 130 );
