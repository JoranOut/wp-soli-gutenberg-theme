<?php
/**
 * Title: Contactpagina
 * Slug: soli-gutenberg-theme/page-contact
 * Categories: soli, page
 * Block Types: core/post-content
 * Post Types: page
 * Description: Startinhoud voor de contactpagina: snelwegwijzer, contactpersonen per onderwerp en postadres. Gebruik het paginacanvas-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"level":1,"fontSize":"huge","className":"soli-page-title"} -->
	<h1 class="wp-block-heading has-huge-font-size soli-page-title">Contact</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"soli-page-lede"} -->
	<p class="soli-page-lede">Bij Soli kom je zelden bij de verkeerde uit &mdash; we helpen je graag verder. Weet je niet zeker wie je moet hebben? Mail het secretariaat, dan komt je vraag vanzelf op de goede plek.</p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":{"left":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-group is-style-soli-panel">
				<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"22px"}}} -->
				<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Algemene vragen', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Secretariaat', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Katja Warns<br><a href="mailto:secretariaat@soli.nl">secretariaat@soli.nl</a><br>+31 6 53 12 56 46</p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-group is-style-soli-panel">
				<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"22px"}}} -->
				<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Muziekles & lid worden', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Hoofd opleidingen', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Marian Miessen<br><a href="mailto:opleidingen@soli.nl">opleidingen@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-group is-style-soli-panel">
				<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"22px"}}} -->
				<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Soli boeken', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'PR & boekingen', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><a href="<?php echo esc_url( home_url( '/vereniging/pr-en-boekingen/' ) ); ?>"><?php esc_html_e( 'PR en Boekingen →', 'soli-gutenberg-theme' ); ?></a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading">Wie doet wat</h2>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"26rem"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px"}}} --><h3 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Bestuur', 'soli-gutenberg-theme' ); ?></h3><!-- /wp:heading -->
			<!-- wp:group {"className":"soli-fact-list","layout":{"type":"default"},"style":{"spacing":{"blockGap":"1rem"}}} -->
			<div class="wp-block-group soli-fact-list">
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Voorzitter', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Joran Korver-Out · <a href="mailto:voorzitter@soli.nl">voorzitter@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Penningmeester', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Tim Essers · <a href="mailto:penningmeester@soli.nl">penningmeester@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Ledenadministratie', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Mariëtte de Vries · <a href="mailto:ledenadministratie@soli.nl">ledenadministratie@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'PR', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Bernadette Duineveld · <a href="mailto:pr@soli.nl">pr@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px"}}} --><h3 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Orkesten', 'soli-gutenberg-theme' ); ?></h3><!-- /wp:heading -->
			<!-- wp:group {"className":"soli-fact-list","layout":{"type":"default"},"style":{"spacing":{"blockGap":"1rem"}}} -->
			<div class="wp-block-group soli-fact-list">
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Harmonieorkest', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Helen van Wolferen · <a href="mailto:harmonie@soli.nl">harmonie@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Klein Orkest', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Freek Bot · <a href="mailto:kleinorkest@soli.nl">kleinorkest@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Opleidingsorkest', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Helma Sintenie · <a href="mailto:opleidingsorkest@soli.nl">opleidingsorkest@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Bigband', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Marjolein van Giessen · <a href="mailto:bigband@soli.nl">bigband@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Slagwerkgroep', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Peter Haan · <a href="mailto:slagwerkgroepsoli@gmail.com">slagwerkgroepsoli@gmail.com</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px"}}} --><h3 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Ensembles & groepen', 'soli-gutenberg-theme' ); ?></h3><!-- /wp:heading -->
			<!-- wp:group {"className":"soli-fact-list","layout":{"type":"default"},"style":{"spacing":{"blockGap":"1rem"}}} -->
			<div class="wp-block-group soli-fact-list">
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Marsorkest', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Corine Smit · <a href="mailto:marsorkest@soli.nl">marsorkest@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Funband', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Mar van Bekkum · <a href="mailto:funband@soli.nl">funband@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'TwirlTeam', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Saskia Haan · <a href="mailto:twirlteamsoli@gmail.com">twirlteamsoli@gmail.com</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Stil Orkest', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Nico van Geldorp · <a href="mailto:stilorkest@soli.nl">stilorkest@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px"}}} --><h3 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Praktische zaken', 'soli-gutenberg-theme' ); ?></h3><!-- /wp:heading -->
			<!-- wp:group {"className":"soli-fact-list","layout":{"type":"default"},"style":{"spacing":{"blockGap":"1rem"}}} -->
			<div class="wp-block-group soli-fact-list">
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Instrumenten', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">a.i. Peter Oudendijk · <a href="mailto:instrumenten@soli.nl">instrumenten@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Uniformen', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Irene Hoogzaad · <a href="mailto:secretariaat@soli.nl">secretariaat@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Muziekcentrum (verhuur)', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Erik Miessen · <a href="mailto:muziekcentrum@soli.nl">muziekcentrum@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Vertrouwenspersonen', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Cees Meinhardt, Annemieke Wieleman &amp; Rian Schelvis<br><a href="mailto:vertrouwenspersoon@soli.nl">vertrouwenspersoon@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"22px"}}} -->
			<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Postadres', 'soli-gutenberg-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>De Ruyterstraat 130<br>1971 BK IJmuiden</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"22px"}}} -->
			<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Langskomen?', 'soli-gutenberg-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Je vindt ons in het Soli Muziekcentrum, direct naast station Driehuis.', 'soli-gutenberg-theme' ); ?> <a href="<?php echo esc_url( home_url( '/vereniging/muziekcentrum/' ) ); ?>"><?php esc_html_e( 'Adres en routebeschrijving →', 'soli-gutenberg-theme' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"className":"is-style-soli-card soli-card-ink","backgroundColor":"ink","textColor":"cream","layout":{"type":"default"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-group is-style-soli-card soli-card-ink has-ink-background-color has-cream-color has-text-color has-background" style="margin-top:var(--wp--preset--spacing--50)">
		<!-- wp:paragraph {"className":"soli-eyebrow-gold"} -->
		<p class="soli-eyebrow-gold"><?php esc_html_e( 'Weet je het niet zeker?', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><?php esc_html_e( 'Stuur je vraag naar het secretariaat — dan zorgt Katja dat hij bij de juiste persoon terechtkomt.', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

<?php
	$soli_contact_cta = array(
		'buttonText'  => __( 'Stel je vraag →', 'soli-gutenberg-theme' ),
		'dialogTitle' => __( 'Vraag aan het secretariaat', 'soli-gutenberg-theme' ),
		'to'          => 'secretariaat@soli.nl',
		'subject'     => __( 'Vraag via soli.nl', 'soli-gutenberg-theme' ),
		'body'        => __(
			"Beste Soli,\n\nIk heb een vraag:\n\n\n\nMet vriendelijke groet,",
			'soli-gutenberg-theme'
		),
	);
	?>
	<!-- wp:soli/email-cta <?php echo wp_json_encode( $soli_contact_cta ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- wp_json_encode returns valid, escaped JSON for the block comment. ?> /-->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
