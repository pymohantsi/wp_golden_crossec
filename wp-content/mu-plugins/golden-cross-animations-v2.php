<?php
/**
 * Plugin Name: Golden Cross Animations V2
 * Description: Consistent scroll-triggered reveal animations for the approved homepage sections.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function golden_cross_is_home_animations_request() {
	return is_front_page() || is_home() || is_page( 'home' ) || is_page( 9 );
}

function golden_cross_output_animations_v2_css() {
	if ( ! golden_cross_is_home_animations_request() ) {
		return;
	}
	?>
	<style id="golden-cross-animations-v2-css">
	/* Reveal-on-scroll. One shared duration/easing site-wide. The classes are
	   added by JS (progressive enhancement) and removed again after the
	   transition ends so section-specific hover transitions take back over. */
	.gc-reveal {
		opacity: 0;
		transform: translateY(24px);
		transition: opacity 600ms cubic-bezier(0.22, 1, 0.36, 1), transform 600ms cubic-bezier(0.22, 1, 0.36, 1);
		will-change: opacity, transform;
	}

	.gc-reveal.gc-reveal--visible {
		opacity: 1;
		transform: translateY(0);
	}

	@media (prefers-reduced-motion: reduce) {
		.gc-reveal {
			opacity: 1 !important;
			transform: none !important;
			transition: none !important;
		}
	}
	</style>
	<?php
}
add_action( 'wp_head', 'golden_cross_output_animations_v2_css', 131 );

function golden_cross_output_animations_v2_script() {
	if ( ! golden_cross_is_home_animations_request() ) {
		return;
	}
	?>
	<script id="golden-cross-animations-v2-js">
	(function () {
		var GROUPS = [
			'.gc-stats-v2-row',
			'.gc-cta-v2-row > .et_pb_column',
			'.gc-welcome-split-image-col, .gc-welcome-split-content-col',
			'.gc-social-feed-v2-copy-col, .gc-social-feed-v2-feed-col',
			'.gc-onsite-facilities-v2-header-row',
			'.gc-onsite-facilities-v2-grid-row > .et_pb_column',
			'.gc-affiliations-v2-row',
			'.gc-affiliations-v2-grid-row > .et_pb_column',
			'.gc-affiliations-v2-banner-row'
		];
		var STAGGER = 90;
		var DURATION = 600;

		var pending = [];
		var checkTimer = null;

		function reveal(el) {
			var delay = parseInt(el.getAttribute('data-gc-reveal-delay') || '0', 10);

			el.style.transitionDelay = delay + 'ms';
			el.classList.add('gc-reveal--visible');

			window.setTimeout(function () {
				el.classList.remove('gc-reveal', 'gc-reveal--visible');
				el.style.transitionDelay = '';
				el.style.willChange = '';
			}, DURATION + delay + 100);
		}

		var heartbeat = null;

		function checkPending() {
			var threshold = window.innerHeight * 0.9;
			var remaining = [];

			pending.forEach(function (el) {
				if ( el.getBoundingClientRect().top < threshold ) {
					reveal(el);
				} else {
					remaining.push(el);
				}
			});

			pending = remaining;

			if ( ! pending.length ) {
				window.removeEventListener('scroll', scheduleCheck);
				window.removeEventListener('resize', scheduleCheck);

				if ( heartbeat ) {
					window.clearInterval(heartbeat);
					heartbeat = null;
				}
			}
		}

		function scheduleCheck() {
			if ( checkTimer ) {
				return;
			}

			checkTimer = window.setTimeout(function () {
				checkTimer = null;
				checkPending();
			}, 80);
		}

		function init() {
			if ( window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches ) {
				return;
			}

			GROUPS.forEach(function (selector) {
				var elements = document.querySelectorAll(selector);

				Array.prototype.slice.call(elements).forEach(function (el, index) {
					// Skip anything already in view on load.
					if ( el.getBoundingClientRect().top < window.innerHeight * 0.9 ) {
						return;
					}

					el.classList.add('gc-reveal');
					el.setAttribute('data-gc-reveal-delay', String(index * STAGGER));
					pending.push(el);
				});
			});

			if ( pending.length ) {
				window.addEventListener('scroll', scheduleCheck, { passive: true });
				window.addEventListener('resize', scheduleCheck);

				// Timer heartbeat: reveals also fire in contexts where scroll
				// events are throttled or suppressed, so content can never be
				// left permanently hidden.
				heartbeat = window.setInterval(checkPending, 400);
			}
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
add_action( 'wp_footer', 'golden_cross_output_animations_v2_script', 131 );
