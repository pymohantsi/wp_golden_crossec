<?php
/**
 * Plugin Name: Golden Cross Hero V2
 * Description: Outputs the approved Hero V2 styling on the front page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function golden_cross_is_home_hero_request() {
	return is_front_page() || is_home() || is_page( 'home' ) || is_page( 9 );
}

function golden_cross_enqueue_hero_v2_fonts() {
	if ( ! golden_cross_is_home_hero_request() ) {
		return;
	}

	wp_enqueue_style(
		'golden-cross-hero-v2-fonts',
		'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap',
		array(),
		null
	);
}
add_action( 'wp_enqueue_scripts', 'golden_cross_enqueue_hero_v2_fonts' );

function golden_cross_output_hero_v2_css() {
	if ( ! golden_cross_is_home_hero_request() ) {
		return;
	}

// 	$asset_url = trailingslashit( get_stylesheet_directory_uri() ) . 'assets/hero-v2-approved.png';
	?>
	<style id="golden-cross-hero-v2-css">
	.gc-hero-v2-section {
		position: relative;
		overflow: hidden;
		padding: 0 !important;
		min-height: 898px;
		background-color: #12153a;
	}

	.gc-hero-v2-section::before {
		content: "SCROLL";
		position: absolute;
		left: 50%;
		bottom: 88px;
		transform: translateX(-50%);
		z-index: 8;
		color: #ffffff;
		font-family: 'Inter', sans-serif;
		font-size: 12px;
		line-height: 13.5px;
		letter-spacing: 1.8px;
		font-weight: 600;
		text-transform: uppercase;
	}

	.gc-hero-v2-section::after {
		content: "";
		position: absolute;
		left: 50%;
		bottom: 54px;
		width: 29.5px;
		height: 29.5px;
		border-right: 3px solid rgba(214, 189, 20, 0.67);
		border-bottom: 3px solid rgba(214, 189, 20, 0.67);
		transform: translateX(-50%) rotate(45deg);
		z-index: 8;
		pointer-events: none;
		animation: gc-hero-v2-arrow-bounce 2s ease-in-out infinite;
	}

	@keyframes gc-hero-v2-arrow-bounce {
		0%, 100% {
			transform: translateX(-50%) translateY(0) rotate(45deg);
		}
		50% {
			transform: translateX(-50%) translateY(9px) rotate(45deg);
		}
	}

	/* Invisible click target over the SCROLL indicator (pseudo-elements can't
	   receive their own clicks); injected by the script below. */
	.gc-hero-v2-scroll-btn {
		position: absolute;
		left: 50%;
		bottom: 40px;
		transform: translateX(-50%);
		width: 120px;
		height: 76px;
		margin: 0;
		padding: 0;
		border: 0;
		background: transparent;
		cursor: pointer;
		z-index: 10;
	}

	.gc-hero-v2-scroll-btn:focus-visible {
		outline: 2px solid #d6bd14;
		outline-offset: 3px;
		border-radius: 6px;
	}

	@media (prefers-reduced-motion: reduce) {
		.gc-hero-v2-section::after {
			animation: none;
		}
	}

	.gc-hero-v2-row {
		width: 100%;
		max-width: none !important;
		margin: 0 auto;
		padding: 0 !important;
	}

	.gc-hero-v2-row,
	.gc-hero-v2-row > .et_pb_column {
		min-height: 898px;
		height: 898px;
	}

	.gc-hero-v2-row > .et_pb_column,
	.gc-hero-v2-slider {
		margin-bottom: 0 !important;
	}

	.gc-hero-v2-slider,
	.gc-hero-v2-slider .et_pb_slides,
	.gc-hero-v2-slider .et_pb_slide {
		min-height: 898px;
		height: 898px;
	}

	.gc-hero-v2-slider {
		background: #12153a !important;
		overflow: hidden;
	}

	.gc-hero-v2-slider .et_pb_slide {
		padding: 0 !important;
		background-color: #12153a;
		background-position: center center !important;
		background-repeat: no-repeat !important;
		background-size: cover !important;
	}

	.gc-hero-v2-slider .et_pb_slide::before {
		content: "";
		position: absolute;
		inset: 0;
		z-index: 1;
		background: linear-gradient(115.227deg, rgba(18, 21, 58, 0.92) 7.735%, rgba(18, 21, 58, 0.72) 50%, rgba(18, 21, 58, 0.35) 92.265%);
		pointer-events: none;
	}

	.gc-hero-v2-slider .et_pb_slide::after {
		content: "";
		position: absolute;
		left: 0;
		right: 0;
		bottom: 0;
		height: 180px;
		z-index: 2;
		background: linear-gradient(to top, rgba(18, 21, 58, 0.75), rgba(0, 0, 0, 0));
		pointer-events: none;
	}

	.gc-hero-v2-slider .et_pb_container {
		position: relative;
		z-index: 3;
		display: block;
		width: 100% !important;
		max-width: 1579px !important;
		min-height: 898px !important;
		height: 898px !important;
		margin: 0 auto !important;
	}

	.gc-hero-v2-slider .et_pb_slide_description {
		position: absolute;
		left: 80px;
		top: 274px;
		width: 391px;
		padding: 0 !important;
		text-align: left !important;
		text-shadow: none !important;
		animation-duration: 520ms;
	}

	.gc-hero-v2-slider .et_pb_slide_title {
		width: 550px;
		max-width: 100%;
		margin: 0 !important;
		padding: 0 !important;
		color: #ffffff !important;
		font-family: 'Bebas Neue', sans-serif !important;
		font-size: 80px !important;
		line-height: 80px !important;
		letter-spacing: 1.6px;
		font-weight: 400 !important;
		text-transform: uppercase;
	}

	/* Figma event card (59:359): 22px top/bottom, 30px left, 50px right;
	   the Enter Now link is a child of the card (59:366). */
	.gc-hero-v2-slider .et_pb_slide_content {
		width: 400px;
		margin-top: 52px;
		padding: 22px 50px 22px 30px;
		background: #12153a;
		border-left: 4px solid #d6bd14;
		border-radius: 12px;
		box-shadow: 0 16px 24px rgba(0, 0, 0, 0.55);
		color: #ffffff !important;
		text-align: left;
	}

	.gc-hero-v2-slider .et_pb_slide_content p {
		margin: 0;
		padding: 0;
	}

	.gc-hero-v2-slider .et_pb_slide_content p:nth-child(1) {
		color: #d6bd14 !important;
		font-family: 'Inter', sans-serif;
		font-size: 16px;
		line-height: 13.5px;
		letter-spacing: 1.98px;
		font-weight: 600;
		text-transform: uppercase;
	}

	.gc-hero-v2-slider .et_pb_slide_content p:nth-child(2) {
		margin-top: 20px;
		color: #ffffff !important;
		font-family: 'Playfair Display', serif;
		font-size: 32px;
		line-height: 32px;
		font-weight: 600;
	}

	.gc-hero-v2-slider .et_pb_slide_content p:nth-child(3) {
		margin-top: 20px;
		color: #d6bd14 !important;
		font-family: 'Inter', sans-serif;
		font-size: 16px;
		line-height: 16px;
		font-weight: 700;
	}

	/* The Divi slider renders its button outside .et_pb_slide_content; the
	   approved design nests the link inside the card, so the link is part of
	   the slide content and any native button stays hidden. */
	.gc-hero-v2-slider .et_pb_more_button.et_pb_button {
		display: none !important;
	}

	.gc-hero-v2-slider .et_pb_slide_content .gc-hero-v2-card-link {
		margin-top: 20px;
	}

	/* Figma Link (59:366): 82x40, 10px padding + 1px gold border, radius 6. */
	.gc-hero-v2-slider .et_pb_slide_content .gc-hero-v2-card-link a {
		display: inline-block;
		padding: 10px;
		border: 1px solid #d6bd14;
		border-radius: 6px;
		background: transparent;
		color: #d6bd14;
		font-family: 'Inter', sans-serif;
		font-size: 12px;
		line-height: 18px;
		font-weight: 600;
		text-decoration: none;
		transition: background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease;
	}

	.gc-hero-v2-slider .et_pb_slide_content .gc-hero-v2-card-link a:hover {
		background: #d6bd14;
		color: #12153a;
	}

	.gc-hero-v2-slider .et-pb-arrow-prev,
	.gc-hero-v2-slider .et-pb-arrow-next {
		display: none !important;
	}

	.gc-hero-v2-slider .et-pb-controllers {
		left: auto;
		right: 100px;
		bottom: 54px;
		display: flex;
		align-items: center;
		justify-content: space-between;
		width: 82px;
		height: 8px;
		z-index: 9;
		text-align: right;
	}

	.gc-hero-v2-slider .et-pb-controllers a {
		width: 8px;
		height: 8px;
		margin: 0 !important;
		border-radius: 4px;
		background: rgba(255, 255, 255, 0.8) !important;
		opacity: 1;
		font-size:0 !important;
		transition: width 240ms ease, background-color 240ms ease;
	}

	.gc-hero-v2-slider .et-pb-controllers a.et-pb-active-control {
		width: 28px;
		background: #d6bd14 !important;
	}

	@media (max-width: 1200px) {
		.gc-hero-v2-section,
		.gc-hero-v2-row,
		.gc-hero-v2-row > .et_pb_column,
		.gc-hero-v2-slider,
		.gc-hero-v2-slider .et_pb_slides,
		.gc-hero-v2-slider .et_pb_slide,
		.gc-hero-v2-slider .et_pb_container {
			min-height: 760px;
			height: 760px;
		}

		.gc-hero-v2-slider .et_pb_slide_description {
			left: 56px;
			top: 212px;
		}

		.gc-hero-v2-slider .et_pb_slide_title {
			font-size: 68px;
			line-height: 68px;
			width: 400px;
		}

		.gc-hero-v2-slider .et_pb_slide_content {
			width: 400px;
			margin-top: 48px;
		}

		.gc-hero-v2-slider .et-pb-controllers {
			right: 56px;
		}
	}

	@media (max-width: 980px) {
		.gc-hero-v2-section,
		.gc-hero-v2-row,
		.gc-hero-v2-row > .et_pb_column,
		.gc-hero-v2-slider,
		.gc-hero-v2-slider .et_pb_slides,
		.gc-hero-v2-slider .et_pb_slide,
		.gc-hero-v2-slider .et_pb_container {
			min-height: 860px;
			height: 860px;
		}

		.gc-hero-v2-slider .et_pb_slide_description {
			left: 40px;
			top: 170px;
			width: calc(100% - 80px);
			max-width: 430px;
		}

		.gc-hero-v2-slider .et_pb_slide_title {
			font-size: 64px;
			line-height: 64px;
			width: 100%;
		}

		.gc-hero-v2-slider .et_pb_slide_content {
			width: calc(100% - 80px);
			max-width: 400px;
			margin-top: 48px;
		}

		.gc-hero-v2-slider .et-pb-controllers {
			right: 40px;
			bottom: 42px;
		}

		.gc-hero-v2-section::before {
			bottom: 78px;
		}

		.gc-hero-v2-section::after {
			bottom: 44px;
		}
	}

	@media (max-width: 767px) {
		.gc-hero-v2-section,
		.gc-hero-v2-row,
		.gc-hero-v2-row > .et_pb_column,
		.gc-hero-v2-slider,
		.gc-hero-v2-slider .et_pb_slides,
		.gc-hero-v2-slider .et_pb_slide,
		.gc-hero-v2-slider .et_pb_container {
			min-height: 760px;
			height: 760px;
		}

		.gc-hero-v2-slider .et_pb_slide_description {
			left: 24px;
			top: 132px;
			width: calc(100% - 48px);
		}

		.gc-hero-v2-slider .et_pb_slide_title {
			font-size: 52px;
			line-height: 52px;
			letter-spacing: 1px;
		}

		.gc-hero-v2-slider .et_pb_slide_content {
			width: calc(100% - 48px);
			margin-top: 40px;
			padding: 20px 22px 20px 22px;
		}

		.gc-hero-v2-slider .et_pb_slide_content p:nth-child(2) {
			font-size: 28px;
			line-height: 30px;
		}

		.gc-hero-v2-section::before {
			bottom: 58px;
		}

		.gc-hero-v2-section::after {
			bottom: 24px;
		}

		.gc-hero-v2-slider .et-pb-controllers {
			left: 24px;
			right: auto;
			display: flex;
			text-align: left;
		}
	}

	@media (max-width: 377px) {
		.gc-hero-v2-slider .et-pb-controllers {
			display: none !important;
		}
	}
	</style>
	<?php
}
add_action( 'wp_head', 'golden_cross_output_hero_v2_css', 120 );

function golden_cross_output_hero_v2_script() {
	if ( ! golden_cross_is_home_hero_request() ) {
		return;
	}
	?>
	<script id="golden-cross-hero-v2-js">
	(function () {
		function init() {
			var hero = document.querySelector('.gc-hero-v2-section');

			if ( ! hero || hero.querySelector('.gc-hero-v2-scroll-btn') ) {
				return;
			}

			var button = document.createElement('button');
			button.type = 'button';
			button.className = 'gc-hero-v2-scroll-btn';
			button.setAttribute('aria-label', 'Scroll to next section');

			function smoothScrollTo(targetY, duration) {
				var startY = window.scrollY || window.pageYOffset;
				var delta = targetY - startY;
				var startTime = null;
				var frameRan = false;

				if ( window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches ) {
					window.scrollTo(0, targetY);
					return;
				}

				function step(timestamp) {
					frameRan = true;

					if ( startTime === null ) {
						startTime = timestamp;
					}

					var progress = Math.min((timestamp - startTime) / duration, 1);
					var eased = progress < 0.5
						? 2 * progress * progress
						: 1 - Math.pow(-2 * progress + 2, 2) / 2;

					window.scrollTo(0, startY + delta * eased);

					if ( progress < 1 ) {
						window.requestAnimationFrame(step);
					}
				}

				window.requestAnimationFrame(step);

				// Throttled/background renderers never fire rAF; jump instead.
				window.setTimeout(function () {
					if ( ! frameRan ) {
						window.scrollTo(0, targetY);
					}
				}, 250);
			}

			button.addEventListener('click', function () {
				var next = hero.nextElementSibling;

				while ( next && ! ( next.offsetWidth || next.offsetHeight ) ) {
					next = next.nextElementSibling;
				}

				if ( next ) {
					var headerOffset = document.body.classList.contains('admin-bar') ? 32 : 0;
					smoothScrollTo(next.getBoundingClientRect().top + (window.scrollY || window.pageYOffset) - headerOffset, 700);
				}
			});

			hero.appendChild(button);
		}

		if ( document.readyState === 'loading' ) {
			document.addEventListener('DOMContentLoaded', init);
		} else {
			init();
		}
	})();
	</script>
	<?php
}
add_action( 'wp_footer', 'golden_cross_output_hero_v2_script', 120 );
