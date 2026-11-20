<?php
/**
 * Title: Groepspagina: Bigband
 * Slug: soli-gutenberg-theme/page-group-bigband
 * Categories: soli
 * Description: Volledige inhoud voor de Bigband-pagina met de video als blikvanger, praktische info, repertoire, een wervingsband en de agenda/vacature. Gebruik het paginacanvas-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

$soli_bb_cta = array(
	'buttonText'  => __( 'Kom eens langs →', 'soli-gutenberg-theme' ),
	'dialogTitle' => __( 'Meespelen met de bigband', 'soli-gutenberg-theme' ),
	'to'          => 'bigband@soli.nl',
	'subject'     => __( 'Meespelen Bigband Soli', 'soli-gutenberg-theme' ),
	'body'        => __(
		"Beste Marjolein,\n\nGraag kom ik een keer langs bij de bigband.\n\nNaam:\nInstrument:\nErvaring:\n\nMet vriendelijke groet,",
		'soli-gutenberg-theme'
	),
);
?>
<!-- wp:group {"tagName":"section","anchor":"bigband-video","align":"full","className":"soli-video-stage","backgroundColor":"ink","textColor":"cream","layout":{"type":"constrained"}} -->
<section id="bigband-video" class="wp-block-group alignfull soli-video-stage has-cream-color has-ink-background-color has-text-color has-background">
	<!-- wp:columns {"verticalAlignment":"bottom","className":"soli-video-stage-head"} -->
	<div class="wp-block-columns are-vertically-aligned-bottom soli-video-stage-head">
		<!-- wp:column {"verticalAlignment":"bottom"} -->
		<div class="wp-block-column is-vertically-aligned-bottom">
			<!-- wp:paragraph {"className":"soli-group-hero-back","fontFamily":"sans","fontSize":"small"} -->
			<p class="soli-group-hero-back has-sans-font-family has-small-font-size"><a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/' ) ); ?>"><?php esc_html_e( '← Orkesten en groepen', 'soli-gutenberg-theme' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1,"className":"soli-video-title"} -->
			<h1 class="wp-block-heading soli-video-title"><?php esc_html_e( 'Bigband', 'soli-gutenberg-theme' ); ?> <em><?php esc_html_e( 'swingt.', 'soli-gutenberg-theme' ); ?></em></h1>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"bottom","width":"40%"} -->
		<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:40%">
			<!-- wp:paragraph {"className":"soli-video-lede"} -->
			<p class="soli-video-lede"><?php esc_html_e( 'Onder leiding van Daniël Follmann en met vaste zangeres Suzanne van Dam. Druk op play en hoor het zelf.', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:embed {"url":"https://www.youtube.com/watch?v=BNz8ttRs9Gw","type":"video","providerNameSlug":"youtube","responsive":true,"className":"wp-embed-aspect-16-9 wp-has-aspect-ratio"} -->
	<figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">
https://www.youtube.com/watch?v=BNz8ttRs9Gw
</div><figcaption class="wp-element-caption"><?php esc_html_e( 'Deep Purple medley, 26 januari 2013.', 'soli-gutenberg-theme' ); ?> <a href="https://www.youtube.com/@muziekverenigingsoli4755"><?php esc_html_e( "Meer video's op YouTube →", 'soli-gutenberg-theme' ); ?></a></figcaption></figure>
	<!-- /wp:embed -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"}} -->
<section class="wp-block-group">
	<!-- wp:columns {"className":"soli-ticket-strip soli-video-ticket"} -->
	<div class="wp-block-columns soli-ticket-strip soli-video-ticket">
		<!-- wp:column {"className":"soli-fact"} -->
		<div class="wp-block-column soli-fact">
			<!-- wp:paragraph {"className":"soli-fact-label"} -->
			<p class="soli-fact-label"><?php esc_html_e( 'Dirigent', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"soli-fact-value"} -->
			<p class="soli-fact-value">Daniël Follmann</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"className":"soli-fact"} -->
		<div class="wp-block-column soli-fact">
			<!-- wp:paragraph {"className":"soli-fact-label"} -->
			<p class="soli-fact-label"><?php esc_html_e( 'Zangeres', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"soli-fact-value"} -->
			<p class="soli-fact-value">Suzanne van Dam</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"className":"soli-fact"} -->
		<div class="wp-block-column soli-fact">
			<!-- wp:paragraph {"className":"soli-fact-label"} -->
			<p class="soli-fact-label"><?php esc_html_e( 'Repetitie', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"soli-fact-value"} -->
			<p class="soli-fact-value"><?php esc_html_e( 'woensdag, even weken', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"soli-fact-note"} -->
			<p class="soli-fact-note"><?php esc_html_e( '20.00-22.30 uur', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"className":"soli-fact"} -->
		<div class="wp-block-column soli-fact">
			<!-- wp:paragraph {"className":"soli-fact-label"} -->
			<p class="soli-fact-label"><?php esc_html_e( 'Repertoire', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"soli-fact-value"} -->
			<p class="soli-fact-value"><?php esc_html_e( 'jazz, film- en tv-muziek', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"className":"soli-video-story","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"},"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns soli-video-story" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
		<!-- wp:column {"width":"58%"} -->
		<div class="wp-block-column" style="flex-basis:58%">
			<!-- wp:paragraph {"className":"soli-page-lede"} -->
			<p class="soli-page-lede"><?php esc_html_e( 'Bigband Soli swingt. Onlangs vierde de band haar tienjarig jubileum met een spetterend concert.', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'De afgelopen jaren speelde de bigband onder meer op het Havenfestival, de Summer Park Sessions en de Christmas Castle Fair. De data van komende optredens vind je in de agenda.', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Gerepeteerd wordt er op woensdag in de even weken, van 20.00 tot 22.30 uur. Benieuwd naar de sfeer? Kom gerust een keer langs.', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"soli-fact-label","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
			<h2 class="wp-block-heading soli-fact-label" style="margin-top:var(--wp--preset--spacing--40)"><?php esc_html_e( 'Gespeeld op', 'soli-gutenberg-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:list {"className":"soli-tag-list"} -->
			<ul class="wp-block-list soli-tag-list">
				<!-- wp:list-item -->
				<li>Havenfestival</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>Summer Park Sessions</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>Christmas Castle Fair</li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"42%"} -->
		<div class="wp-block-column" style="flex-basis:42%">
			<!-- wp:group {"className":"is-style-soli-panel soli-setlist","layout":{"type":"default"}} -->
			<div class="wp-block-group is-style-soli-panel soli-setlist">
				<!-- wp:heading {"style":{"typography":{"fontSize":"22px"}}} -->
				<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Op de lessenaars', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:list {"ordered":true} -->
				<ol class="wp-block-list">
					<!-- wp:list-item -->
					<li>Skyfall</li>
					<!-- /wp:list-item -->
					<!-- wp:list-item -->
					<li>Love Boat</li>
					<!-- /wp:list-item -->
					<!-- wp:list-item -->
					<li>I Wanna Be Like You</li>
					<!-- /wp:list-item -->
					<!-- wp:list-item -->
					<li>Feeling Good</li>
					<!-- /wp:list-item -->
					<!-- wp:list-item -->
					<li>Hawaii Five-O</li>
					<!-- /wp:list-item -->
				</ol>
				<!-- /wp:list -->

				<!-- wp:paragraph {"className":"soli-fact-note"} -->
				<p class="soli-fact-note"><?php esc_html_e( 'Het repertoire van dit seizoen: film- en tv-muziek.', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->

<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/bigband.jpg' ) ); ?>","dimRatio":0,"isUserOverlayColor":true,"minHeight":520,"align":"full","className":"soli-promo-band","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull soli-promo-band" style="min-height:520px">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/bigband.jpg' ) ); ?>" data-object-fit="cover"/>
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"className":"soli-promo-inner","layout":{"type":"default"}} -->
		<div class="wp-block-group soli-promo-inner">
			<!-- wp:paragraph {"className":"soli-eyebrow-gold"} -->
			<p class="soli-eyebrow-gold"><?php esc_html_e( 'Tien jaar Bigband Soli', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"soli-promo-title"} -->
			<h2 class="wp-block-heading soli-promo-title"><?php esc_html_e( 'Jij op de 1e trompet.', 'soli-gutenberg-theme' ); ?> <em><?php esc_html_e( 'Wij doen de rest.', 'soli-gutenberg-theme' ); ?></em></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"soli-promo-sub"} -->
			<p class="soli-promo-sub"><?php esc_html_e( 'Swing, Bond-thema\'s en een zaal die meeklapt. Elke even woensdag, en de koffie staat klaar.', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-gold-cta"} -->
				<div class="wp-block-button is-style-gold-cta"><a class="wp-block-button__link wp-element-button" href="#bigband-meespelen"><?php esc_html_e( 'Ik wil meeswingen →', 'soli-gutenberg-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"soli-button-ghost"} -->
				<div class="wp-block-button soli-button-ghost"><a class="wp-block-button__link wp-element-button" href="#bigband-video"><?php esc_html_e( 'Eerst luisteren', 'soli-gutenberg-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column {"width":"42%"} -->
		<div class="wp-block-column" style="flex-basis:42%">
			<!-- wp:group {"className":"is-style-soli-card soli-card-ink","backgroundColor":"ink","textColor":"cream","layout":{"type":"default"}} -->
			<div class="wp-block-group is-style-soli-card soli-card-ink has-cream-color has-ink-background-color has-text-color has-background">
				<!-- wp:paragraph {"className":"soli-eyebrow-gold"} -->
				<p class="soli-eyebrow-gold"><?php esc_html_e( 'Agenda', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textColor":"white","fontSize":"x-large"} -->
				<h2 class="wp-block-heading has-white-color has-text-color has-x-large-font-size"><?php esc_html_e( 'Hoor ons live', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size"><?php esc_html_e( 'Van havenfestival tot kerstmarkt: bekijk waar de bigband binnenkort speelt.', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/agenda/' ) ); ?>"><?php esc_html_e( 'Naar de agenda', 'soli-gutenberg-theme' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"58%"} -->
		<div class="wp-block-column" style="flex-basis:58%">
			<!-- wp:group {"anchor":"bigband-meespelen","className":"is-style-soli-card soli-card-ink","backgroundColor":"ink","textColor":"cream","layout":{"type":"default"}} -->
			<div id="bigband-meespelen" class="wp-block-group is-style-soli-card soli-card-ink has-cream-color has-ink-background-color has-text-color has-background">
				<!-- wp:paragraph {"className":"soli-eyebrow-gold"} -->
				<p class="soli-eyebrow-gold"><?php esc_html_e( 'Vacature', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textColor":"white","fontSize":"x-large"} -->
				<h2 class="wp-block-heading has-white-color has-text-color has-x-large-font-size"><?php esc_html_e( '1e trompet en trombone gezocht', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size"><?php esc_html_e( 'Kom een keer luisteren of meespelen op woensdagavond. Contact: Marjolein van Giessen,', 'soli-gutenberg-theme' ); ?> <a href="mailto:bigband@soli.nl">bigband@soli.nl</a></p>
				<!-- /wp:paragraph -->

				<!-- wp:soli/email-cta <?php echo wp_json_encode( $soli_bb_cta ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- wp_json_encode returns valid, escaped JSON for the block comment. ?> /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
