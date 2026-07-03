<?php
/**
 * Plugin Name: Golden Cross Social Feed V2
 * Description: Outputs the approved Social Feed V2 styling on the front page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function golden_cross_is_home_social_feed_request() {
	return is_front_page() || is_home() || is_page( 'home' ) || is_page( 9 );
}

/**
 * Feed data source. Placeholder posts matching the approved Figma content
 * (node 59:475 "facebook-feed"). Once a Facebook Graph API key is available,
 * hook `gc_facebook_feed_posts` and return real posts in the same shape.
 */
function golden_cross_get_facebook_feed_posts() {
	$placeholder = array(
		array(
			'time'     => '2 hours ago',
			'text'     => "\u{1F4E2} Entries are now OPEN for the Senior BS Cat 2 Show on 24 June! Don't miss out \u{2014} spaces fill up fast. Enter now via the link in our bio or head to Equo. \u{1F3C6}\u{1F434} #GoldenCrossEC #ShowJumping #EastSussex",
			'likes'    => 47,
			'comments' => 12,
		),
		array(
			'time'     => 'Yesterday at 3:14pm',
			'text'     => "What a fantastic weekend of competition! \u{1F31F} Huge congratulations to everyone who competed at our British Dressage qualifier. The standard was incredible \u{2014} we're so proud of our riders. See the full results on our website. \u{1F389}",
			'likes'    => 89,
			'comments' => 23,
		),
	);

	return apply_filters( 'gc_facebook_feed_posts', $placeholder );
}

function golden_cross_facebook_feed_shortcode() {
	$posts    = golden_cross_get_facebook_feed_posts();
	$logo_url = trailingslashit( get_stylesheet_directory_uri() ) . 'assets/fb-brand-logo.png';

	$icon_like    = '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 10v12H4a1 1 0 0 1-1-1V11a1 1 0 0 1 1-1h3Zm4.5-7.5 .77.06A2.5 2.5 0 0 1 14 5v4h5.24a2 2 0 0 1 1.97 2.35l-1.38 7.5A2 2 0 0 1 17.86 20H9V9.61L11.5 2.5Z" stroke="#6b6b6b" stroke-width="1.6" stroke-linejoin="round"/></svg>';
	$icon_comment = '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M21 11.5a8.38 8.38 0 0 1-8.5 8.5 8.5 8.5 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 8.5-8.5 8.38 8.38 0 0 1 8.5 8.5Z" stroke="#6b6b6b" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>';
	$icon_share   = '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 12v7a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7M16 6l-4-4-4 4M12 2v13" stroke="#6b6b6b" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>';

	ob_start();
	?>
	<div class="gc-fb-feed" role="complementary" aria-label="Latest Facebook posts">
		<div class="gc-fb-feed__header">
			<span class="gc-fb-feed__avatar">
				<img src="<?php echo esc_url( $logo_url ); ?>" alt="Golden Cross Equestrian Centre logo" loading="lazy" />
			</span>
			<span class="gc-fb-feed__identity">
				<span class="gc-fb-feed__name">Golden Cross Equestrian Centre</span>
				<span class="gc-fb-feed__url">facebook.com/goldencross.ec</span>
			</span>
		</div>
		<?php foreach ( $posts as $post ) : ?>
		<div class="gc-fb-feed__post">
			<span class="gc-fb-feed__time"><?php echo esc_html( $post['time'] ); ?></span>
			<p class="gc-fb-feed__text"><?php echo esc_html( $post['text'] ); ?></p>
			<div class="gc-fb-feed__actions">
				<span class="gc-fb-feed__action"><?php echo $icon_like; // phpcs:ignore ?><span><?php echo esc_html( $post['likes'] ); ?> Like</span></span>
				<span class="gc-fb-feed__action"><?php echo $icon_comment; // phpcs:ignore ?><span><?php echo esc_html( $post['comments'] ); ?> Comment</span></span>
				<span class="gc-fb-feed__action"><?php echo $icon_share; // phpcs:ignore ?><span>Share</span></span>
			</div>
		</div>
		<?php endforeach; ?>
		<div class="gc-fb-feed__footer">Live Facebook feed &mdash; facebook.com/goldencross.ec</div>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'gc_facebook_feed', 'golden_cross_facebook_feed_shortcode' );

function golden_cross_output_social_feed_v2_css() {
	if ( ! golden_cross_is_home_social_feed_request() ) {
		return;
	}
	?>
	<style id="golden-cross-social-feed-v2-css">
	/* Figma SocialFeedV2 (59:458): white section, 1000px content block,
	   470px copy + 60px gap + 470px feed card. */
	.gc-social-feed-v2-section {
		padding: 80px 40px !important;
		background: #ffffff !important;
	}

	.gc-social-feed-v2-row {
		display: flex;
		align-items: flex-start;
		width: 100%;
		max-width: 1000px !important;
		margin: 0 auto !important;
		padding: 0 !important;
	}

	.gc-social-feed-v2-row > .et_pb_column {
		margin-bottom: 0;
	}

	.gc-social-feed-v2-copy-col {
		display: flex;
		flex-direction: column;
		justify-content: flex-start;
		padding-right: 60px !important;
	}

	.gc-social-feed-v2-feed-col {
		display: flex;
		justify-content: flex-end;
	}

	.gc-social-feed-v2-copy-col .et_pb_module:last-child,
	.gc-social-feed-v2-feed-col .et_pb_module:last-child {
		margin-bottom: 0 !important;
	}

	.gc-social-feed-v2-eyebrow {
		margin: 0 0 14px 0 !important;
	}

	.gc-social-feed-v2-eyebrow .et_pb_text_inner {
		color: #d6bd14;
		font-family: 'Inter', sans-serif;
		font-size: 10px;
		font-weight: 600;
		line-height: 15px;
		letter-spacing: 2.2px;
		text-transform: uppercase;
	}

	.gc-social-feed-v2-heading {
		margin: 0 !important;
	}

	.gc-social-feed-v2-heading .et_pb_module_header {
		color: #12153a;
		font-family: 'Playfair Display', serif;
		font-size: 40px;
		font-weight: 600;
		line-height: 48px;
		letter-spacing: 0;
	}

	.gc-social-feed-v2-divider {
		width: 48px !important;
		max-width: 48px !important;
		height: 3px;
		margin: 20px 0 20px 0 !important;
	}

	.gc-social-feed-v2-divider:before {
		border-top-color: #d6bd14 !important;
		border-top-width: 3px !important;
	}

	.gc-social-feed-v2-body {
		max-width: 470px;
		margin: 0 0 28px 0 !important;
	}

	.gc-social-feed-v2-body .et_pb_text_inner {
		color: #6b6b6b;
		font-family: 'Inter', sans-serif;
		font-size: 15px;
		font-weight: 400;
		line-height: 25.5px;
		letter-spacing: 0;
	}

	.gc-social-feed-v2-button {
		margin: 0 !important;
	}

	/* Figma Follow button (59:471): 11px/22px padding, 10px gap, 13px/19.5 label. */
	.gc-social-feed-v2-button .et_pb_button,
	.et_pb_button.gc-social-feed-v2-button {
		display: inline-flex !important;
		align-items: center;
		gap: 10px;
		padding: 11px 22px !important;
		border: 0 !important;
		border-radius: 4px !important;
		background: #1877f2 !important;
		color: #ffffff !important;
		font-family: 'Inter', sans-serif !important;
		font-size: 13px !important;
		font-weight: 600 !important;
		line-height: 19.5px !important;
		letter-spacing: 0 !important;
		box-shadow: none !important;
		text-transform: none !important;
	}

	.gc-social-feed-v2-button .et_pb_button:before,
	.et_pb_button.gc-social-feed-v2-button:before {
		content: "";
		display: inline-block;
		width: 16px;
		height: 16px;
		flex: 0 0 16px;
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Ccircle cx='12' cy='12' r='12' fill='white'/%3E%3Cpath fill='%231877F2' d='M13.28 19v-5.78h1.94l.29-2.25h-2.23V9.52c0-.65.18-1.09 1.11-1.09h1.18V6.42c-.2-.03-.88-.08-1.67-.08-1.65 0-2.79 1.01-2.79 2.86v1.77H9.44v2.25h1.67V19h2.17Z'/%3E%3C/svg%3E");
		background-size: contain;
		background-repeat: no-repeat;
		background-position: center;
	}

	.gc-social-feed-v2-button .et_pb_button:hover,
	.et_pb_button.gc-social-feed-v2-button:hover {
		padding: 11px 22px !important;
		background: #1665cc !important;
		color: #ffffff !important;
	}

	.gc-social-feed-v2-button .et_pb_button:after,
	.et_pb_button.gc-social-feed-v2-button:after {
		display: none !important;
	}

	.gc-social-feed-v2-feed {
		width: 100%;
		max-width: 470px;
		margin: 0 !important;
		padding: 0 !important;
	}

	/* Figma facebook-feed card (59:475). */
	.gc-fb-feed {
		width: 100%;
		border: 1px dashed rgba(18, 21, 58, 0.18);
		border-radius: 10px;
		background: #ffffff;
		overflow: hidden;
	}

	.gc-fb-feed__header {
		display: flex;
		align-items: center;
		gap: 12px;
		padding: 14px 18px 15px;
		background: #f4f4f0;
		border-bottom: 1px solid rgba(18, 21, 58, 0.1);
	}

	.gc-fb-feed__avatar {
		display: block;
		width: 36px;
		height: 36px;
		flex: 0 0 36px;
		border-radius: 18px;
		background: #292c63;
		overflow: hidden;
	}

	.gc-fb-feed__avatar img {
		display: block;
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	.gc-fb-feed__identity {
		display: flex;
		flex-direction: column;
	}

	.gc-fb-feed__name {
		color: #12153a;
		font-family: 'Inter', sans-serif;
		font-size: 13px;
		font-weight: 600;
		line-height: 19.5px;
	}

	.gc-fb-feed__url {
		color: #1877f2;
		font-family: 'Inter', sans-serif;
		font-size: 11px;
		font-weight: 400;
		line-height: 16.5px;
	}

	.gc-fb-feed__post {
		padding: 16px 18px 17px;
		background: #ffffff;
		border-bottom: 1px solid rgba(18, 21, 58, 0.08);
	}

	.gc-fb-feed__post:last-of-type {
		border-bottom: 0;
		padding-bottom: 16px;
	}

	.gc-fb-feed__time {
		display: block;
		color: #9b9b9b;
		font-family: 'Inter', sans-serif;
		font-size: 11px;
		font-weight: 400;
		line-height: 16.5px;
	}

	.gc-fb-feed__text {
		margin: 6px 0 0 !important;
		padding: 0 !important;
		color: #1a1a1a;
		font-family: 'Inter', sans-serif;
		font-size: 13px;
		font-weight: 400;
		line-height: 21.45px;
	}

	.gc-fb-feed__actions {
		display: flex;
		gap: 20px;
		padding-top: 12px;
	}

	.gc-fb-feed__action {
		display: inline-flex;
		align-items: center;
		gap: 5px;
		color: #6b6b6b;
		font-family: 'Inter', sans-serif;
		font-size: 11px;
		font-weight: 500;
		line-height: 16.5px;
	}

	.gc-fb-feed__action svg {
		display: block;
		width: 13px;
		height: 13px;
	}

	.gc-fb-feed__footer {
		padding: 12px 18px;
		background: #f4f4f0;
		color: #9b9b9b;
		font-family: 'Inter', sans-serif;
		font-size: 11px;
		font-style: italic;
		font-weight: 400;
		line-height: 16.5px;
		text-align: center;
	}

	@media (max-width: 980px) {
		.gc-social-feed-v2-section {
			padding: 72px 32px !important;
		}

		.gc-social-feed-v2-row {
			display: block;
		}

		.gc-social-feed-v2-copy-col {
			padding-right: 0 !important;
			margin-bottom: 32px !important;
		}

		.gc-social-feed-v2-feed-col {
			justify-content: flex-start;
		}
	}

	@media (max-width: 767px) {
		.gc-social-feed-v2-section {
			padding: 56px 24px !important;
		}

		.gc-social-feed-v2-heading .et_pb_module_header {
			font-size: 36px;
			line-height: 1.14;
		}

		.gc-social-feed-v2-body {
			max-width: none;
		}

		.gc-social-feed-v2-feed {
			max-width: none;
		}
	}
	</style>
	<?php
}
add_action( 'wp_head', 'golden_cross_output_social_feed_v2_css', 128 );
